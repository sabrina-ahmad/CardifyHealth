{{--

@extends('admin.layout')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            {{-- <div class="col-md-3 bg-dark text-white vh-100">
                <h4 class="p-3">Admin Dashboard</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.hospitals.waitlist') }}" class="nav-link text-white">Hospital Waitlist</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">Users</a>
                    </li>
                </ul>
            </div>

            <!-- Main content -->
            <div class="col-md-9 p-4">
                <h2>Welcome, Admin</h2>
                <p>Use the sidebar to manage hospitals, doctors, and patients.</p>
            </div>
        </div>
    </div>
@endsection
--}}

<x-admin>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <x-aside></x-aside>
            <div class="col py-4 mt-5">
                <div id="content-home" class="content-section active">
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
                        </div>

                        <!-- Statistics Cards -->
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Pending Hospitals</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $stats['pending_hospitals'] }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-hospital fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Active Hospitals</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $stats['active_hospitals'] }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-hospital fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Total Doctors</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $stats['total_doctors'] }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user-md fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Total Departments</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    {{ $stats['total_departments'] }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-building fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Section -->
                        <div class="row">
                            <div class="col-xl-6 mb-4">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h6 class="m-0 font-weight-bold text-primary">Hospital Status Distribution</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="hospitalChart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 mb-4">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h6 class="m-0 font-weight-bold text-primary">Doctor Statistics</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="doctorChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Quick Navigation</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 mb-4">
                                                <a href="{{ route('admin.hospitals') }}"
                                                    class="btn btn-primary btn-block">
                                                    <i class="fas fa-hospital mr-2"></i> Manage Hospitals
                                                </a>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <a href="{{ route('admin.waitlist') }}"
                                                    class="btn btn-warning btn-block">
                                                    <i class="fas fa-clock mr-2"></i> Hospital Waitlist
                                                </a>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <a href="{{ route('admin.doctors') }}"
                                                    class="btn btn-success btn-block">
                                                    <i class="fas fa-user-md mr-2"></i> Manage Doctors
                                                </a>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <a href="{{ route('admin.departments') }}"
                                                    class="btn btn-info btn-block">
                                                    <i class="fas fa-building mr-2"></i> Manage Departments
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="content-hospitals" class="content-section ">

                    <h2>Pending Hospital Approvals</h2>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Contact Person</th>
                                <th>License Number</th>
                                <th>Actions</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($hospitals as $hospital)
                                <tr>
                                    <td>{{ $hospital->hospital_name }}</td>
                                    <td>{{ $hospital->email }}</td>
                                    <td>{{ $hospital->address }}</td>
                                    <td>{{ $hospital->phone_number }}</td>
                                    <td>{{ $hospital->contact_person }}</td>
                                    <td>{{ $hospital->license_number }}</td>
                                    <td>{{ $hospital->status }}</td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('admin.hospitals.approve', $hospital->id) }}"
                                            style="display:inline;">
                                            @csrf
                                            <button class="btn btn-success btn-sm">More</button>
                                        </form>
                                        <form method="POST"
                                            action="{{ route('admin.hospitals.reject', $hospital->id) }}"
                                            style="display:inline;">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No hospitals waiting for approval.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div id="content-waitlist" class="content-section ">

                    <h2>Pending Hospital Approvals</h2>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>License Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($hospitals as $hospital)
                                <tr>
                                    <td>{{ $hospital->hospital_name }}</td>
                                    <td>{{ $hospital->email }}</td>
                                    <td>{{ $hospital->address }}</td>
                                    <td>{{ $hospital->license_number }}</td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('admin.hospitals.approve', $hospital->id) }}"
                                            style="display:inline;">
                                            @csrf
                                            <button class="btn btn-success btn-sm">Approve</button>
                                        </form>
                                        <form method="POST"
                                            action="{{ route('admin.hospitals.reject', $hospital->id) }}"
                                            style="display:inline;">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">Reject</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No hospitals waiting for approval.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div id="content-doctors" class="content-section">
                    Dashboard content goes here
                </div>
                <div id="content-patients" class="content-section">
                    Dashboard content goes here
                </div>
                <div id="content-medical" class="content-section">
                    Dashboard content goes here
                </div>
                <div id="content-registerDoctors" class="content-section container">
                    <!-- Register Doctor Section -->
                    <section id="register">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Register New Doctor</h3>
                            </div>
                            <div class="card-body">
                                <form id="doctorRegisterForm">
                                    <div class="mb-3">
                                        <label for="doctorName" class="form-label">Doctor Name</label>
                                        <input type="text" class="form-control" id="doctorName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="doctorEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="doctorEmail" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="specialty" class="form-label">Specialty</label>
                                        <select class="form-select" id="specialty" required>
                                            <option value="">Select Specialty</option>
                                            <option value="cardiology">Cardiology</option>
                                            <option value="neurology">Neurology</option>
                                            <option value="pediatrics">Pediatrics</option>
                                            <!-- Add more specialties as needed -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <select class="form-select" id="department" required>
                                            <option value="">Select Department</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Register Doctor</button>
                                </form>
                            </div>
                        </div>
                    </section>

                    <!-- View Doctors Section -->
                    <section id="view-doctors">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Registered Doctors</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Specialty</th>
                                            <th>Department</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="doctorsList">
                                        <!-- Dynamic content will be inserted here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
                <div id="content-customers" class="content-section">
                    Customer content goes here
                </div>
                <!-- Add more content sections as needed -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Hospital Status Chart
        const ctx1 = document.getElementById('hospitalChart').getContext('2d');
        new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: @json($hospitalData['labels']),
                datasets: [{
                    label: 'Hospital Status',
                    data: @json($hospitalData['values']),
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(75, 192, 192, 0.5)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Doctor Statistics Chart
        const ctx2 = document.getElementById('doctorChart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: @json($doctorData['labels']),
                datasets: [{
                    label: 'Total Doctors',
                    data: @json($doctorData['values']),
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-admin>
