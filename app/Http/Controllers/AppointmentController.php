<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function index()
    {
        // $appointments = auth()->user()->appointments()
        //     ->with('doctor.department')
        //     ->orderBy('date_time', 'desc')
        //     ->get();

        return "welcom";
        // return view('appointments.create', compact('appointments'));
    }

    // public function create()
    // {
    //     $departments = Department::all();
    //     $doctors = Doctor::with('department')
    //         ->whereDoesntHave('appointments', function ($query) {
    //             $query->where('status', 'pending')
    //                 ->whereDate('date_time', Carbon::today());
    //         })
    //         ->get();
    //
    //     return view('appointments.create', compact('departments', 'doctors'));
    // }

    public function create()
    {
        $departments = Department::all();
        $doctors = Doctor::all();
        return view("appointments.create", compact('departments', 'doctors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'department_id' => 'required',
            'medical_condition' => 'required',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'reason_for_visit' => 'nullable|string',
            'status' => 'nullable|in:pending,completed,cancelled', // optional status input
        ]);


        // Check for appointment conflict: Same doctor, same date and time
        $existingAppointment = Appointment::where('doctor_id', $validated['doctor_id'])
            ->whereDate('appointment_date', $validated['appointment_date'])
            ->whereTime('appointment_time', $validated['appointment_time'])
            ->exists();

        if ($existingAppointment) {
            return back()->withErrors(['appointment_time' => 'This doctor already has an appointment at this time.']);
        }

        // Create the appointment record if no conflict exists
        $appointment = Appointment::create([
            'patient_id' => $validated['patient_id'],
            'doctor_id' => $validated['doctor_id'],
            'department_id' => $validated['department_id'],
            'medical_condition' => $validated['medical_condition'],
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'reason_for_visit' => $validated['reason_for_visit'] ?? null,
            'status' => 'pending',  // Default status if not provided
        ]);

        return redirect()->route('dashboard')->with('success', 'Appointment successfully created!');
    }

    public function show($id)
    {
        $appointment = Appointment::with('doctor.department')
            ->findOrFail($id);

        if ($appointment->user_id !== auth()->id()) {
            abort(403);
        }

        return view('appointments.show', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        if ($appointment->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|in:pending,completed,cancelled'
        ]);

        $appointment->update($validated);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment status updated!');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);

        if ($appointment->user_id !== auth()->id()) {
            abort(403);
        }

        $appointment->delete();

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment cancelled!');
    }
}
