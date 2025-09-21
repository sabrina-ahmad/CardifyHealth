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
                    Dashboard content goes here
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
</x-admin>
