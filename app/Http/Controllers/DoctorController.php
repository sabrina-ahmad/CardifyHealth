<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            // 'password' => 'sometimes|nullable|string|min:8',
            // 'available_hours' => 'required|array',
            // 'max_appointments_per_day' => 'required|integer|min:1|max:20'
        ]);

        $doctor = Doctor::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'specialty' => $validated['specialty'],
            'department_id' => $validated['department_id'],
            'hospital_id' => $validated['hospital_id'],
            'password' => Hash::make("12345678"),
        ]);

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

    public function dashboard()
    {
        $doctorId = auth('doctor')->user()->id;

        $todaysAppointments = Appointment::where('doctor_id', $doctorId)
            ->whereDate('appointment_date', today())
            ->get();

        $upcomingAppointments = Appointment::where('doctor_id', $doctorId)
            ->whereDate('appointment_date', '>', today())
            ->get();

        $newPatients = Appointment::where('doctor_id', $doctorId)
            ->where('status', 'new')
            ->get();

        $followUpPatients = Appointment::where('doctor_id', $doctorId)
            ->where('medical_condition', 'Follow-up Visit')
            ->get();

        $emergencyCases = Appointment::where('doctor_id', $doctorId)
            ->where('status', 'emergency')
            ->get();

        $recentActivity = Appointment::where('doctor_id', $doctorId)
            ->orderBy('updated_at', 'desc')
            ->take(10)
            ->get();


        $activeCases = Appointment::where('doctor_id', $doctorId)
            ->whereIn('status', ['active', 'pending'])
            ->get();

        $pendingAppointments = Appointment::where('doctor_id', $doctorId)
            ->where('status', 'pending')
            ->get();

        $completedAppointments = Appointment::where('doctor_id', $doctorId)
            ->where('status', 'completed')
            ->get();

        $cancelledAppointments = Appointment::where('doctor_id', $doctorId)
            ->where('status', 'cancelled')
            ->get();

        return view('doctor.dashboard', compact(
            'todaysAppointments',
            'upcomingAppointments',
            'newPatients',
            'followUpPatients',
            'emergencyCases',
            'recentActivity',
            'activeCases',
            'pendingAppointments',
            'completedAppointments',
            'cancelledAppointments',
        ));
        // $doctorId = auth('doctor')->user()->id;
        //
        // $appointments = Appointment::where('doctor_id', $doctorId);
        //
        // return view('doctor.dashboard', compact(
        //     'appointments'
        //     // 'todaysAppointments',
        //     // 'upcomingAppointments',
        //     // 'newPatients',
        //     // 'followUpPatients',
        //     // 'emergencyCases',
        //     // 'recentActivity'
        // ));

        // Today's appointments
        // $todaysAppointments = DoctorController::getTodaysAppointments();
        // // Upcoming appointments
        // $upcomingAppointments = DoctorController::getUpcomingAppointments();
        // Patient statistics
        // $newPatients = $doctor->patients()->where('first_visit', true)->count();
        // $followUpPatients = $doctor->patients()->where('first_visit', false)->count();
        // $emergencyCases = $doctor->appointment()
        //     ->where('is_emergency', true)
        //     ->count();
        //
        // // Recent activity
        // $recentActivity = $doctor->activities()
        //     ->latest()
        //     ->take(5)
        //     ->get();

    }

    // // In your controller
    // public function getTodaysAppointments()
    // {
    //     $doctor = auth()->user();
    //
    //
    //     if (!$doctor) {
    //         return response()->json(['message' => 'Doctor not found'], 404);
    //     }
    //
    //     return $doctor->appointment()->whereDate('scheduled_at', today())->get();
    // }
    //
    // public function getUpcomingAppointments()
    // {
    //     $doctor = auth()->user();
    //
    //     if (!$doctor) {
    //         return response()->json(['message' => 'Doctor not found'], 404);
    //     }
    //
    //     return $doctor->appointment()
    //         ->where('appointment_date', '>', today())
    //         ->where('status', 'pending')
    //     ;
    // }
}
