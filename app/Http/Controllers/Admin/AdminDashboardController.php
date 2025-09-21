<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // $unverifiedHospitals = Hospital::whereNull('email_verified_at')->get();

        $hospitals = Hospital::where('status', 'pending')->get();

        return view('admin.dashboard', compact('hospitals'));
        // return view('admin.dashboard', compact('unverifiedHospitals'));
    }

    public function loadPage($page)
    {
        if ($page == 'home') {
            $html = view('admin.pages.home')->render();
        } elseif ($page == 'about') {
            $html = view('admin.pages.home')->render();
        } else {
            $html = '<p>Page not found.</p>';
        }
        return response()->json(['html' => $html]);
    }

    public function approve($id)
    {
        $hospital = Hospital::findOrFail($id);
        $hospital->email_verified_at = now();
        $hospital->save();

        return redirect()->route('admin.dashboard')->with('success', 'Hospital approved.');
    }

    public function reject($id)
    {
        $hospital = Hospital::findOrFail($id);
        $hospital->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Hospital rejected and removed.');
    }
}
