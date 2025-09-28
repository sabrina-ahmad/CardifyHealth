<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
            'report' => 'nullable|string',
            'paymethod_amount' => 'required|integer|max:200',
            'status' => 'nullable|in:pending,completed,cancelled,new,emergency', // optional status input
        ]);

        $appointmentDateTime = new \DateTime($validated['appointment_date'] . ' ' . $validated['appointment_time']);

        $existingAppointment = Appointment::where('doctor_id', $validated['doctor_id'])->where('appointment_date', $appointmentDateTime)->exists();

        if ($existingAppointment) {
            return back()->withErrors(['appointment_time' => 'This doctor already has an appointment at this time.']);
        }

        // Create the appointment record if no conflict exists
        $appointment = new Appointment();
        $appointment->user_id = $validated['patient_id'];
        $appointment->doctor_id = $validated['doctor_id'];
        $appointment->department_id = $validated['department_id'];
        $appointment->medical_condition = $validated['medical_condition'];
        $appointment->appointment_date = $appointmentDateTime;
        $appointment->reason_for_visit = $validated['reason_for_visit'] ?? null;
        $appointment->status = $validated['status'] ?? 'pending';
        $appointment->paymethod_amount = $validated['paymethod_amount'];

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
        $appointments = Appointment::where('user_id', auth()->user()->_id)
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

    public function edit(Request $request, Appointment $appointment)
    {

        $previousAppointment = $appointment;

        $hospital_id = $appointment->hospital_id;
        $hospital = Hospital::findOrFail(
            $appointment->doctor->hospital->id
        );
        return view("appointments.edit", compact("appointment", "previousAppointment", "hospital"));
    }

    public function reappointment(Request $request)
    {

        $validated = $request->validate([
            'previous_appointment_id' => 'required',
            'doctor_id' => 'required',
            'department_id' => 'required',
            'medical_condition' => 'required',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'reason_for_visit' => 'nullable|string',
        ]);

        $appointmentDateTime = new \DateTime($validated['appointment_date'] . ' ' . $validated['appointment_time']);

        $dateChange = Appointment::where('id', $request->previous_appointment_id)
            ->where("appointment_date", $appointmentDateTime)
            ->exists();

        // Check for conflicting appointments with other doctors
        $existingAppointment = Appointment::where('appointment_date', $appointmentDateTime)
            ->where(function ($query) use ($request) {
                $query->whereNull('previous_appointment_id')
                    ->orWhere('previous_appointment_id', '!=', $request->previous_appointment_id);
            })
            ->exists();

        if ($existingAppointment && !$dateChange) {
            return back()->withErrors([
                'appointment_time' => 'There is already an appointment scheduled at this time.'
            ]);
        }

        $appointment = Appointment::findOrFail($request->previous_appointment_id);

        $appointment->update([
            "doctor_id" => $validated['doctor_id'],
            "department_id" => $validated['department_id'],
            "medical_condition" => $validated['medical_condition'],
            "appointment_date" => $appointmentDateTime,
            "reason_for_visit" => $validated['reason_for_visit'] ?? null,
        ]);

        // // Before update
        // Log::info('Updating appointment with data:', [
        //     'previous_id' => $request->previous_appointment_id,
        //     'new_data' => $appointment->getAttributes(),
        // ]);
        //
        // // After update
        // if ($appointment->wasChanged()) {
        //     Log::info('Appointment updated successfully');
        // } else {
        //     Log::warning('No changes detected in appointment update');
        // }

        return redirect()->route('myAppointments')
            ->with('success', 'Reappointment successfully!');
    }

    // public function edit(Request $request, Appointment $appointment)
    // {
    //     $previousAppointment = $appointment->id;
    //     $hospital_id = $appointment->hospital_id;
    //     $hospital = Hospital::findOrFail($hospital_id);
    //
    //     // return view("appointments.edit", compact("previousAppointment", "hospital"));
    //     return view("appointments.edit");
    // }

    public function complete(Request $request)
    {
        $validated = $request->validate([
            'report' => 'required|string',
        ]);

        $appointment = Appointment::findOrFail($request->appointment_id);

        $appointment->update([
            "report" => $validated['report'],
            'status' => 'completed',
        ]);

        return redirect()->route("doctor.dashboard")->with("success", "Pateint Appointment have completed successfully!");
    }

    public function finish(Request $request, Appointment $appointment)
    {
        $patient_name = $appointment->user->fullname;

        return view("doctor.finish", compact("patient_name", "appointment"));
        $doctorID = auth()->user()->id;
        $isDoctor = Doctor::where('id', $doctorID)->exists();

        // if ($isDoctor) {
        // }

        // Validate appointment status
        if ($appointment->status !== 'pending') {
            return back()->withErrors([
                'status' => 'Only pending appointments can be marked as completed.'
            ]);
        }

        $appointment->update([
            'status' => 'completed',
            'completed_at' => now()
        ]);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment marked as completed successfully!');
    }

    public function reschedule(Request $request, Appointment $appointment)
    {
        // Validate doctor access
        // if (auth()->user()->role !== 'doctor') {
        //     abort(403);
        // }

        // Validate appointment status
        if (!in_array($appointment->status, ['pending', 'completed'])) {
            return back()->withErrors([
                'status' => 'Only pending appointments can be rescheduled.'
            ]);
        }

        $validated = $request->validate([
            'new_time' => 'required|date_format:H:i',
            'new_date' => 'required|date_format:Y-m-d'
        ]);

        // Create new datetime object
        $newDateTime = Carbon::parse($validated['new_date'] . ' ' . $validated['new_time']);

        // Check for conflicts
        $existingAppointment = Appointment::where('doctor_id', $appointment->doctor_id)
            ->whereDate('appointment_date', $newDateTime)
            ->whereTime('appointment_time', $newDateTime)
            ->where('id', '!=', $appointment->id)
            ->exists();

        if ($existingAppointment) {
            return back()->withErrors([
                'new_time' => 'This doctor already has an appointment at this time.'
            ]);
        }

        // Update appointment
        $appointment->update([
            'appointment_date' => $newDateTime,
            'status' => 'rescheduled',
            'rescheduled_at' => now()
        ]);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment rescheduled successfully!');
    }
}
