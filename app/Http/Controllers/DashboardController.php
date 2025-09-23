<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $id = Auth::user()->id;  // Get the authenticated user's ID
        $appointments = Appointment::where("patient_id", $id)->get();  // Correct the query to use the variable $id

        return view('patient.dashboard', compact('appointments'));  // Pass the appointments to the view
    }


    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        return view("patient.profile", compact('user'));
    }

    public function hospitals()
    {
        $hospitals = Hospital::where('status', 'approved')->get();
        $departments = Department::all();
        $doctors = Doctor::all();
        $appointments = Appointment::all();

        return view('patient.hospitals', compact('hospitals', 'departments', 'doctors', 'appointments'));
    }

    public function search(Request $request)
    {
        $hospitals = Hospital::all();
        $departments = Department::all();
        $doctors = Doctor::all();
        $appointments = Appointment::all();

        $hospitalQuery = Hospital::query();
        $departmentQuery = Department::query();
        $doctorQuery = Doctor::query();
        $appointmentQuery = Appointment::query();

        $searchTerm = $request->input('search');

        switch ($request->searchby) {
            case 'hospital':
                if ($request->has('search')) {
                    $hospitalQuery->where('hospital_name', 'like', '%' . $searchTerm . '%')->where('status', 'approved');
                    $hospitals = $hospitalQuery->paginate(6);
                }
                break;
            case 'department':
                if ($request->has('search')) {
                    // Assuming Department model is related to Hospital with 'hospital_id' as the foreign key
                    $hospitals = Hospital::whereHas('department', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', '%' . $searchTerm . '%');
                    })->paginate(6);
                }

                break;
            case 'doctor':
                if ($request->has('search')) {
                    $hospitals = Hospital::whereHas('doctor', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', '%' . $searchTerm . '%');
                    })->paginate(6);
                }
                break;
            case 'address':
                if ($request->has('search')) {
                    $hospitalQuery->where('address', 'like', '%' . $searchTerm . '%')->where('status', 'approved');
                    $hospitals = $hospitalQuery->paginate(6);
                }
                break;
            default:
                $hospitals = $hospitalQuery->where('hospital_name', 'like', '%' . $searchTerm . '%')->where('status', 'approved')->paginate(6);
                break;
        }


        return view('patient.hospitals', compact('hospitals', 'departments', 'doctors', 'appointments'));
    }

    public function test(Request $request)
    {
        $results = Doctor::all();
        return view('test', compact('results'));
    }
}
