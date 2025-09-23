<x-layout :title="'Hospitals'">

    <div class="container mt-5">
        <div class="row">
            <!-- Welcome Section -->
            <div class="col-md-4 mb-4">

                <div class="card border-primary shadow-sm">
                    <div class="card-body">
                        <h1>Welcome, {{ auth()->user()->fullname }} 🎉</h1>
                        <p>Your role: {{ auth()->user()->role }}</p>
                        @if (auth()->user()->role === 'patient')
                            <a href="{{ route('myAppointments') }}" class="btn btn-primary w-100 mt-3">
                                Your Appointment
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Appointment List -->
            <div class="col-md-8">
                <div class="card border-primary shadow-sm">
                    <form method="GET" action="{{ route('dashboard') }}" value="{{ request()->get('search') }}">
                        <div class="card-header bg-dark text-white">
                            <h3>Search Hospitals</h3>
                            <div class="input-group">
                                <input type="text" class="form-control" name="search"
                                    placeholder="Search hospital..." value="{{ request()->get('search') }}"
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <button class="btn btn-gradient-primary" type="submit"
                                    id="basic-addon2">Search</button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>Search by</h3>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="searchby" type="radio"
                                            id="inlineCheckbox2" value="hospital"
                                            {{ request()->get('searchby') == 'hospital' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineCheckbox2">Hospital</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="searchby" type="radio"
                                            id="inlineCheckbox1" value="department"
                                            {{ request()->get('searchby') == 'department' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineCheckbox1">Department</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="searchby" type="radio"
                                            id="inlineCheckbox3" value="doctor"
                                            {{ request()->get('searchby') == 'doctor' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineCheckbox3">Doctor</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="searchby" type="radio"
                                            id="inlineCheckbox3" value="address"
                                            {{ request()->get('searchby') == 'address' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineCheckbox3">Address</label>
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <ul id="itemList" class="list-group">
                                        <div class="row gap-0">
                                            <div class="col-md-6 p-0 m-0">
                                                <li class="list-group-item">Hospital: {{ $hospitals->count() }}</li>
                                                <li class="list-group-item">Doctor: {{ $doctors->count() }}</li>
                                            </div>
                                            <div class="col-md-6 p-0">
                                                <li class="list-group-item">Department: {{ $departments->count() }}
                                                </li>
                                                <li class="list-group-item">Appointment: {{ $appointments->count() }}
                                                </li>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                @foreach ($hospitals as $hospital)
                                    <div class="col-md-4 mb-4">
                                        <!-- Card for each hospital -->
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $hospital->hospital_name }}</h5>

                                                <p><strong>Department Number:</strong>
                                                    {{ $hospital->department ? $hospital->department->count() : 'No Department Assigned' }}
                                                </p>

                                                <p><strong>Appointment Number:</strong>
                                                    {{ $hospital->appointments ? $hospital->appointments->count() : 'No Appointment Assigned' }}
                                                </p>

                                                <p><strong>Doctor Number:</strong>
                                                    {{ $hospital->doctor ? $hospital->doctor->count() : 'No Doctor Assigned' }}
                                                </p>

                                                <p><strong>Address:</strong>
                                                    {{ $hospital->address }}
                                                </p>

                                                <!-- Button to route to appointments page -->
                                                <a href="{{ route('appointments.index', ['hospital_id' => $hospital->id]) }}"
                                                    class="btn btn-primary mt-3">View Appointments</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                    </form>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $hospitals->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>

</x-layout>
