<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

class PdfExportController extends Controller
{
    //

    public function generatePDF()
    {
        $id = auth()->user()->id;
        $patient = User::findOrFail($id);
        $appointments = Appointment::where('user_id', $id)
            ->where('status', 'completed')
            ->get();

        return view("pdf.example", compact('patient', 'appointments'));
        // $pdf = Pdf::view('pdf.example', ['name' => 'John Doe'])
        //     ->format('a4') // Optional: specify paper size
        //     ->save('example.pdf'); // Save to storage/app/example.pdf
        //
        // return $pdf->download('pdf.example'); // Or stream/download the PDF to browser
    }
}
