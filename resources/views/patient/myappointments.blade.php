@php
    $user = auth()->user();
    $recentAppointments = $appointments->sortByDesc('appointment_date')->take(5);
    $pendingAppointments = $appointments->where('status', 'pending');
    $completedAppointments = $appointments->where('status', 'completed');
    $cancelledAppointments = $appointments->where('status', 'cancelled');
@endphp

<x-layout :title="'My Appointments'">
    <div class="container mt-5 py-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">My Appointments</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Appointments</h5>
                                <p class="card-text">{{ count($appointments) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Upcoming</h5>
                                <p class="card-text">{{ $pendingAppointments->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Completed</h5>
                                <p class="card-text">{{ $completedAppointments->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-danger text-white mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Cancelled</h5>
                                <p class="card-text">{{ $cancelledAppointments->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Appointments Section -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-3">Recent Appointments</h3>
                @if ($recentAppointments->count() > 0)
                    @foreach ($recentAppointments as $appointment)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title">Recent Appointment</h5>
                                <div class="float-end">
                                    @if ($appointment->status === 'pending')
                                        <form action="{{ route('appointments.cancel', $appointment->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to cancel this appointment?')">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Cancel Appointment
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
                                        <p><strong>Medical Condition:</strong> {{ $appointment->medical_condition }}</p>
                                        <p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Department:</strong> {{ $appointment->department->name }}</p>
                                        <p><strong>Reason:</strong> {{ $appointment->reason_for_visit }}</p>
                                        <p><strong>Status:</strong>
                                            <span
                                                class="badge bg-{{ $appointment->status === 'pending'
                                                    ? 'warning'
                                                    : ($appointment->status === 'completed'
                                                        ? 'success'
                                                        : 'danger') }}">
                                                {{ ucfirst($appointment->status) }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="text-muted">No recent appointments found.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Status-Based Sections -->
        <div class="row">
            <!-- Pending Appointments -->
            <div class="col-md-6">
                <h3 class="mb-3">Pending Appointments</h3>
                @if ($pendingAppointments->count() > 0)
                    @foreach ($pendingAppointments as $appointment)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title">Pending Appointment</h5>
                                <div class="float-end">
                                    <form action="{{ route('appointments.cancel', $appointment->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to cancel this appointment?')">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Cancel Appointment
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
                                        <p><strong>Medical Condition:</strong> {{ $appointment->medical_condition }}
                                        </p>
                                        <p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Department:</strong> {{ $appointment->department->name }}</p>
                                        <p><strong>Reason:</strong> {{ $appointment->reason_for_visit }}</p>
                                        <p><strong>Status:</strong>
                                            <span class="badge bg-warning">
                                                {{ ucfirst($appointment->status) }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="text-muted">No pending appointments found.</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Completed Appointments -->
            <div class="col-md-6">
                <h3 class="mb-3">Completed Appointments</h3>
                @if ($completedAppointments->count() > 0)
                    @foreach ($completedAppointments as $appointment)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title">Completed Appointment</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
                                        <p><strong>Medical Condition:</strong> {{ $appointment->medical_condition }}
                                        </p>
                                        <p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Department:</strong> {{ $appointment->department->name }}</p>
                                        <p><strong>Reason:</strong> {{ $appointment->reason_for_visit }}</p>
                                        <p><strong>Status:</strong>
                                            <span class="badge bg-success">
                                                {{ ucfirst($appointment->status) }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="text-muted">No completed appointments found.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
