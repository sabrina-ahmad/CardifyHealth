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
            </div> --}}

            <!-- Main content -->
            <div class="col-md-9 p-4">
                <h2>Welcome, Admin</h2>
                <p>Use the sidebar to manage hospitals, doctors, and patients.</p>
            </div>
        </div>
    </div>
@endsection
