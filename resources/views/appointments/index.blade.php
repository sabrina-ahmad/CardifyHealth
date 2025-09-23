<x-layout :title="$hospital->hospital_name">
    <div class="bg-body-tertiary">
        <div class="container col-8 mb-5 py-5">
            <div class="card shadow-lg border-0">
                <!-- Hospital Header -->
                <div class="card-header bg-primary text-white rounded-top">
                    <h2 class="mb-0">Hospital Information</h2>
                </div>

                <!-- Hospital Details -->
                <div class="card-body">
                    <div class="row">
                        <!-- Hospital Info -->
                        <div class="col-md-8 mb-4">
                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <h5 class="card-title">Hospital Details</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><strong>Hospital Name:</strong>
                                            {{ $hospital->hospital_name }}</li>
                                        <li class="mb-2"><strong>Phone Number:</strong> {{ $hospital->phone_number }}
                                        </li>
                                        <li><strong>Address:</strong> {{ $hospital->address }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="col-md-4 mb-4">
                            <div class="card bg-primary text-white border-0">
                                <div class="card-body text-center">
                                    <h6 class="text-uppercase mb-2">Department Count</h6>
                                    <h3>{{ $hospital->department->count() }}</h3>
                                    <small
                                        class="opacity-75">{{ $hospital->department->count() ? 'Active Departments' : 'No Departments' }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Departments Section -->
                    <div class="mb-4">
                        <h3 class="mb-3">Departments</h3>
                        <div class="accordion accordion-flush" id="departmentsAccordion">
                            @foreach ($hospital->department as $department)
                                <div class="accordion-item border rounded mb-2">
                                    <h2 class="accordion-header" id="dept{{ $department->id }}Header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#dept{{ $department->id }}"
                                            aria-expanded="false" aria-controls="dept{{ $department->id }}">
                                            {{ $department->name }}
                                        </button>
                                    </h2>
                                    <div id="dept{{ $department->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="dept{{ $department->id }}Header">
                                        <div class="accordion-body">
                                            <ul class="list-unstyled">
                                                @foreach ($hospital->doctor as $doctor)
                                                    @if ($doctor->department_id == $department->id)
                                                        <li>Dr. {{ $doctor->name }} - {{ $doctor->specialty }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Book Appointment Button -->
                    <div class="text-center mt-4">
                        <a href="{{ route('appointments.create', ['hospital_id' => $hospital->id]) }}"
                            class="btn btn-primary btn-lg rounded-pill px-5">
                            Book New Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
