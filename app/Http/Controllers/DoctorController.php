<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('department')
            ->orderBy('name')
            ->get();

        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('doctors.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'specialty' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'hospital_id' => 'required|exists:hospitals,id',
            // 'available_hours' => 'required|array',
            // 'max_appointments_per_day' => 'required|integer|min:1|max:20'
        ]);

        Doctor::create($validated);
        return back()->with('success', 'Doctor added successfully!');
    }

    public function show($id)
    {
        $doctor = Doctor::with('department', 'appointments')
            ->findOrFail($id);

        return view('doctors.show', compact('doctor'));
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $departments = Department::all();

        return view('doctors.edit', compact('doctor', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'specialty' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'available_hours' => 'required|array',
            'max_appointments_per_day' => 'required|integer|min:1|max:20'
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($validated);

        return back()->with('success', 'Doctor updated successfully!');
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);

        // Check if doctor has pending appointments
        if ($doctor->appointments()->pending()->exists()) {
            return back()->withErrors([
                'error' => 'Cannot delete doctor with pending appointments.'
            ]);
        }

        $doctor->delete();

        return back()->with('success', 'Doctor deleted successfully!');
    }
}
