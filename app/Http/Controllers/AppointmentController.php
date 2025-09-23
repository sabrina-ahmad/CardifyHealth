<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function index()
    {

        $hospital_id = request()->get('hospital_id');
        $hospital = Hospital::findOrFail($hospital_id);

        return view("appointments.index", compact('hospital'));
    }

    public function create()
    {
        $hospital_id = request()->get('hospital_id');
        $hospital = Hospital::findOrFail($hospital_id);

        return view("appointments.create", compact('hospital'));
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

        $appointmentDateTime = new \DateTime($validated['appointment_date'] . ' ' . $validated['appointment_time']);

        $existingAppointment = Appointment::where('doctor_id', $validated['doctor_id'])->where('appointment_date', $appointmentDateTime)->exists();

        if ($existingAppointment) {
            return back()->withErrors(['appointment_time' => 'This doctor already has an appointment at this time.']);
        }


        // Create the appointment record if no conflict exists
        $appointment = new Appointment();
        $appointment->patient_id = $validated['patient_id'];
        $appointment->doctor_id = $validated['doctor_id'];
        $appointment->department_id = $validated['department_id'];
        $appointment->medical_condition = $validated['medical_condition'];
        $appointment->appointment_date = $appointmentDateTime;
        $appointment->reason_for_visit = $validated['reason_for_visit'] ?? null;
        $appointment->status = $validated['status'] ?? 'pending';

        // Save the appointment
        $appointment->save();

        // Return success response
        return redirect()->route('myAppointments')
            ->with('success', 'Appointment created successfully!');
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

    public function myAppointments()
    {
        $appointments = Appointment::where('patient_id', auth()->user()->_id)
            ->orderBy('appointment_date', 'desc')
            ->get();

        return view('patient.myappointments', compact('appointments'));
    }

    public function cancel(Request $request, Appointment $appointment)
    {
        if ($appointment->status !== 'pending') {
            return back()->withErrors(['status' => 'Only pending appointments can be cancelled.']);
        }

        $appointment->update([
            'status' => 'cancelled',
            'cancelled_at' => now()
        ]);

        return back()->with('success', 'Appointment has been cancelled successfully.');
    }
}
