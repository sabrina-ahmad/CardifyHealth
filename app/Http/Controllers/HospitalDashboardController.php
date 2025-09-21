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
        return view('hospital.dashboard', compact('hospital'));
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
