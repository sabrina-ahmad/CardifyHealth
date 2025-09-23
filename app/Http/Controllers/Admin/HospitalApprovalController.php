<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Hospital;

class HospitalApprovalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();
        return view('admin.hospitals', compact('hospitals'));
    }

    public function pending()
    {
        $hospitals = Hospital::where('status', 'pending')->get();
        return view('admin.waitlist', compact('hospitals'));
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


    public function destroy($id)
    {
        $hospital = Hospital::findOrFail($id);
        $hospital->delete();

        return back()->with('error', 'Hospital deleted successfully.');
    }

    public function destroyDoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return back()->with('error', 'Hospital deleted successfully.');
    }

    public function doctors()
    {
        $doctors = Doctor::all();

        return view('admin.doctors', compact('doctors'));
    }
}
