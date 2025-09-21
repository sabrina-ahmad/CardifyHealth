<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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
}
