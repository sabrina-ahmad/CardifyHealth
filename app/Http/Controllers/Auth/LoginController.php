<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Hospital;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class LoginController extends Controller
{
    // public function showLoginForm()
    // {
    //     return view('auth.login');
    // }

    // public function login(Request $request)
    // {
    //     // Validate the form input
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     // Try to log the admin in using the 'admin' guard
    //     if (
    //         Auth::guard('admin')->attempt(
    //             ['email' => $request->email, 'password' => $request->password],
    //             $request->filled('remember')
    //         )
    //     ) {
    //         // Redirect to admin dashboard or intended URL
    //         return redirect()->intended(route('admin.dashboard'));
    //     }

    //     // Login failed — redirect back with error
    //     return back()->withErrors([
    //         'email' => 'Invalid credentials.',
    //     ])->onlyInput('email');
    // }

    // public function logout(Request $request)
    // {
    //     Auth::guard('admin')->logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect()->route('login');
    // }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user, $request->filled('remember'));

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'doctor') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'patient') {
                return redirect()->route('dashboard');
            }

            return redirect()->route('dashboard');
        }

        $hospital = Hospital::where('email', $request->email)->first();
        if ($hospital && Hash::check($request->password, $hospital->password)) {

            if ($hospital->status === 'pending') {
                return back()->withErrors([
                    'email' => 'Your hospital account is pending approval.',
                ]);
            } elseif ($hospital->status === 'rejected') {
                return back()->withErrors([
                    'email' => 'Your hospital account is regected contact us.'
                ]);
            }

            // Auth::login($hospital, $request->filled('remember'));
            Auth::guard('hospital')->login($hospital, $request->filled('remember'));


            return redirect()->route('hospital.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
