<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;

class HospitalApprovalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::where('status', 'pending')->get();
        return view('admin.hospitals.waitlist', compact('hospitals'));
    }

    public function approve($id)
    {
        $hospital = Hospital::findOrFail($id);
        $hospital->update(['status' => 'approved']);
        return back()->with('success', 'Hospital approved successfully.');
    }

    public function reject($id)
    {
        $hospital = Hospital::findOrFail($id);
        $hospital->update(['status' => 'rejected']);
        return back()->with('error', 'Hospital rejected.');
    }
}
