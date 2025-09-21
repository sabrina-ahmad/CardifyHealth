<?php
// namespace App\Http\Controllers;
//
// use App\Exports\PatientExport;
// use Maatwebsite\Excel\Facades\Excel;
//
// class UserExportController extends Controller
// {
// public function exportExcel()
// {
// return Excel::download(new PatientExport, 'users.xlsx');
// }
//
// public function exportPDF()
// {
// $users = \App\Models\User::all();
// $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('users.pdf', compact('users'));
// return $pdf->download('users.pdf');
// }
// }


// namespace App\Http\Controllers;
//
// use App\Exports\PatientExport;
// use App\Exports\UsersExport;
// use Maatwebsite\Excel\Facades\Excel;
//
// class UsersController extends Controller
// {
//     public function export()
//     {
//         return Excel::download(new PatientExport, 'users.xlsx');
//     }
// }


// In UserExportController.php
namespace App\Http\Controllers;

use App\Exports\PatientExport;
use Maatwebsite\Excel\Facades\Excel;

class PatientExportController extends Controller
{
    public function export()
    {
        return Excel::download(new PatientExport, 'users.xlsx');
    }
}
