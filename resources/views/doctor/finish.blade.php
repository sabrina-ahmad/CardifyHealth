@extends('components.doctor')

@section('content')
    <div class="container mt-3">
        <div class="container">
            <div>
                <div class="container mt-4">
                    <div class="row">
                        <!-- Patient Information Card -->
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-header bg-primary text-white">
                                    <h3>Patient Details</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Patient Name -->
                                    <div class="mb-3 row">
                                        <div class="">
                                            <div> Patient Name: {{ $patient_name }}</div>
                                        </div>
                                    </div>

                                    <!-- Medical Condition -->
                                    <div class="mb-3 row">
                                        <div class="">
                                            <div>Condition: {{ $appointment->medical_condition }}</div>
                                        </div>
                                    </div>

                                    <!-- Appointment Date -->
                                    <div class="mb-3 row">

                                        <div class="">
                                            <div>Appointment Date: {{ $appointment->appointment_date->format('m-d-Y') }}
                                                {{ $appointment->appointment_date->format('h:i A') }}</div>
                                        </div>
                                    </div>

                                    <!-- Reason for Visit -->
                                    <div class="mb-3 row">

                                        <div class="">
                                            <div>Reason for Visit: {{ $appointment->reason_for_visit }}</div>
                                        </div>

                                    </div>

                                    <!-- Status -->
                                    <div class="mb-3 row">
                                        <div class="">
                                            Status:
                                            <span
                                                class="badge bg-{{ $appointment->status === 'pending'
                                                    ? 'warning'
                                                    : ($appointment->status === 'completed'
                                                        ? 'success'
                                                        : 'danger') }}">
                                                {{ ucfirst($appointment->status) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Report Form -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h4>Add Medical Report</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('appointments.complete') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" class="d-none form-control" name="appointment_id"
                                            value="{{ $appointment->id }}">

                                        <div class="mb-3">
                                            <textarea class="form-control" rows="6" name="report" placeholder="Enter medical report details..."
                                                aria-describedby="reportHelp" required>{{ old('report') }} </textarea>
                                            <small id="reportHelp" class="form-text text-muted">Please include all relevant
                                                observations and treatment plans.</small>
                                        </div>
                                        <button type="submit" class="btn btn-success w-100">Complete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
