<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalDashboardController extends Controller
{
    public function index()
    {
        $hospital = Auth::user();

        $inactivityThreshold = now()->subDays(30);

        $stats = [
            'total_doctors' => $hospital->doctor->count(),
            'total_departments' => $hospital->department->count(),
            'active_doctors' => $hospital->doctor()
                ->whereHas('appointments', function ($query) use ($inactivityThreshold) {
                    $query->where('appointment_date', '>=', $inactivityThreshold);
                })
                ->count(),
            'inactive_doctors' => $hospital->doctor()
                ->whereDoesntHave('appointments', function ($query) use ($inactivityThreshold) {
                    $query->where('appointment_date', '>=', $inactivityThreshold);
                })
                ->count()
        ];

        // Get data for charts
        $doctorData = [
            'labels' => ['Active', 'Inactive'],
            'values' => [
                $hospital->doctor()
                    ->whereHas('appointments', function ($query) use ($inactivityThreshold) {
                        $query->where('appointment_date', '>=', $inactivityThreshold);
                    })
                    ->count(),
                $hospital->doctor()
                    ->whereDoesntHave('appointments', function ($query) use ($inactivityThreshold) {
                        $query->where('appointment_date', '>=', $inactivityThreshold);
                    })
                    ->count()
            ]
        ];

        return view('hospital.dashboard', compact('hospital', 'stats', 'doctorData'));
    }

    public function doctors()
    {
        $id = Auth::user()->id;
        $departments = Department::where('hospital_id', $id)->get();
        $doctors = Doctor::where('hospital_id', $id)->get();
        return view('hospital.doctors', compact("departments", "doctors"));
    }

    // public function store(Request $request)
    // {
    //     $input = $request->validate([
    //         'fullname' => 'required',
    //         'email' => 'required|email',
    //         'specialty' => 'required',
    //         'department' => 'required',
    //     ]);
    //
    //
    //
    //     return back()->with('success', 'Doctor registred.');
    // }
}
