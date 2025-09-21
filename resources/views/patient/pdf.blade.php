<!DOCTYPE html>
<html>

<head>
    <title>User List PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>User List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->dob }}</td>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

<!-- Route::get('/export-users/pdf', [UserExportController::class, 'exportPDF'])->name('users.export.pdf'); -->
<!-- UserExportController.php: -->
<!---->
<!-- use Barryvdh\DomPDF\Facade\Pdf; -->
<!-- use App\Models\User; -->
<!---->
<!-- public function exportPDF() -->
<!-- { -->
<!--     $users = User::all(); -->
<!---->
<!--     $pdf = Pdf::loadView('users.pdf', compact('users')); -->
<!--     return $pdf->download('users.pdf'); -->
<!-- } -->


<!-- <a href="{{ route('users.export.excel') }}" class="btn btn-success">Export to Excel</a> -->
<!-- <a href="{{ route('users.export.pdf') }}" class="btn btn-danger">Export to PDF</a> -->
