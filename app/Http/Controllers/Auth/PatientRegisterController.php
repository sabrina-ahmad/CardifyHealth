<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PatientRegisterController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        // $validated = $request->validate([
        //     'fullname' => 'required|string|max:255',
        //     'username' => 'required|string|max:255|unique:users,username',
        //     'email' => 'required|string|email|max:255|unique:users,email',
        //     'phone_number' => 'nullable|string|max:20',
        //     // 'email' => 'required|string|email:rfc,dns|max:255|unique:users,email',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        try {
            $validated = $request->validate([
                'fullname' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username',
                'email' => 'required|string|email|max:255|unique:users,email',
                'phone_number' => 'nullable|string|max:20',
                'password' => 'required|string|min:8|confirmed',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('active_tab', $request->input('tab', 'patient')); // default tab if none provided
        }

        // Create user
        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role' => 'patient',
        ]);

        // Login after registration (optional)
        // auth()->login($user);
        auth()->guard()->login($user);

        return redirect()->route('dashboard')->with('success', 'Patient registered successfully!');
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username,' . auth()->id(), // Skip check for current username
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(), // Skip check for current email
            'phone_number' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'nullable',
            'gender' => 'nullable',
        ]);

        $user = auth()->user(); // Get the authenticated user

        // Handle profile image upload if it exists
        if ($request->hasFile('profile_image')) {
            // Store the image in the 'profile_images' directory inside the 'public' disk
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        // Update the user data
        $user->fullname = $request->input('fullname');
        // $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->dob = $request->input('dob');
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');

        // Save the changes
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function updateUsername(Request $request)
    {

        $validated = $request->validate([
            'username' => 'nullable|string|max:255|unique:users,username,' . auth()->id()
        ]);

        $user = auth()->user(); // Get the authenticated user

        $existingUsername = User::where('username', $validated['username'])->exists();
        $User = User::findOrFail($user->id);

        if ($validated['username'] == $User->username) {
            return back()->with('warning', 'Nothing updated!');
        }

        if ($existingUsername) {
            return back()->with('error', 'User is already exists try another one!');
        }

        $user->username = $request->input('username');
        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }

    public function destroy()
    {
        $id = auth()->user()->id;

        $patient = User::findOrFail($id);

        $existsPatient = User::where('id', $patient->id)->exists();

        if ($existsPatient) {
            $patient->delete();
        } else {
            return redirect('/')->with('error', 'Attempted to delete unauthorized account!');
        }

        return redirect('/')->with('info', 'Account deleted successfully!');
    }
}
