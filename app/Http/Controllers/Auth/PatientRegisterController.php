<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PatientRegisterController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone_number' => 'nullable|string|max:20',
            // 'email' => 'required|string|email:rfc,dns|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

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

        // Save the changes
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
