<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Rap2hpoutre\FastExcel\FastExcel;
use Rap2hpoutre\FastExcel\SheetCollection;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Writer\Common\Creator\Style\StyleBuilder;

class ExcelExportController extends Controller
{
    public function exportUsers()
    {
        $id = auth()->user()->id;

        $users = User::where('id', $id)->get();
        return (new FastExcel($users))->download('users_export.xlsx', function ($user) {
            return [
                'ID' => $user->id,
                'Name' => $user->fullname,
                'Email' => $user->email,
            ];
        });
    }

    public function exportUserAppointments()
    {
        $user_id = auth()->user()->id;

        $user = User::where('id', $user_id)->get();
        $appointments = Appointment::where('user_id', $user_id)->get();


        $headerStyle = (new Style())->setFontBold()->setFontSize(14)->setBackgroundColor('0000FF'); // blue header background
        $rowsStyle = (new Style())->setFontSize(12)->setShouldWrapText()->setFontColor('000000'); // black font rows

        $patientDetail = User::where('id', $user_id)->get()->map(function ($user) {
            return [
                'Fullname' => $user->fullname,
                'Email' => $user->email,
                'Date of Birth' => $user->dob,
            ];
        });

        $appointments = Appointment::where('user_id', $user_id)->where('status', 'completed')->get()->map(function ($appointment) {
            return [
                'Appointment' => $appointment->appointment_date->format('d-m-Y H:i:s'), // my appointment date look like this in excel: 45926.397222222 but i database it look like this: 2025-09-25T03:36:00.000+00:00
                'Medical Condition' => $appointment->medical_condition,
                'Reason for Vist' => $appointment->reason_for_visit,
                'Doctor' => $appointment->doctor->name,
                'Department' => $appointment->department->name,
                'Doctor Note' => $appointment->report,
            ];
        });

        $sheets = new SheetCollection([
            'Patient Detail' => $patientDetail,
            'Appointments' => $appointments,
        ]);

        return (new FastExcel($sheets))
            // ->headerStyle($headerStyle)
            // ->rowsStyle($rowsStyle)
            ->download('user_appointments.xlsx');
    }
}
