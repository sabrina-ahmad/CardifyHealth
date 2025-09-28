@extends('components.doctor')

@section('content')
    <div class="container mt-3">
        <div class="container-fluid">
            <h1 class="h3 mb-1 text-gray-800">Wellcome Dr. {{ Auth::user()->name }}</h1>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Your Dashboard</h1>
                <a href="{{ route('doctor.dashboard') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Schedule New Appointment
                </a>
            </div>

            <div class="row">
                <!-- Today's Appointments -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Today's Appointments
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $todaysAppointments->count() }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Appointments -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Upcoming Appointments
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $upcomingAppointments->count() }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- New Patients -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        New Patients
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $newPatients->count() }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Cases -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Active Cases
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $activeCases->count() }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-stethoscope fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Today's Schedule -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Today's Schedule</h6>
                    </div>
                    <div class="card-body">
                        <!-- Scrollable container -->
                        <div class="timeline scrollable-container" style="height: 200px; overflow-y: auto;">
                            @foreach ($todaysAppointments as $appointment)
                                <div class="timeline-item border mb-1 rounded px-1 py-1">
                                    <div class="timeline-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <strong>{{ $appointment->user->fullname }}</strong>
                                                <small class="text-muted">{{ $appointment->medical_condition }}</small>
                                                <small class="text-muted">{{ $appointment->appointment_time }}</small>
                                                <small class="text-muted"><span
                                                        class="badge bg-{{ $appointment->status === 'pending'
                                                            ? 'warning'
                                                            : ($appointment->status === 'completed'
                                                                ? 'success'
                                                                : 'danger') }}">
                                                        {{ ucfirst($appointment->status) }}
                                                    </span></small>
                                            </div>

                                            <div class="text-right d-flex mb-1 gap-1">
                                                <!-- <button class="btn btn-success">Schedule</button> -->
                                                @if ($appointment->status === 'pending')
                                                    <form action="{{ route('appointments.finish', $appointment->id) }}"
                                                        method="GET">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning">Complete</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <!-- All Appointment -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All Appointments</h6>
                    </div>
                    <div class="card-body">
                        <!-- Scrollable container -->
                        <div class="timeline scrollable-container" style="height: 300px; overflow-y: auto;">
                            @foreach ($appointments as $appointment)
                                <div class="timeline-item border mb-1 rounded px-1 py-1">
                                    <div class="timeline-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <strong>{{ $appointment->user->fullname }}</strong>
                                                <small class="text-muted">{{ $appointment->medical_condition }}</small>
                                                <small class="text-muted">{{ $appointment->appointment_date }}</small>
                                                <small class="text-muted"><span
                                                        class="badge bg-{{ $appointment->status === 'pending'
                                                            ? 'warning'
                                                            : ($appointment->status === 'completed'
                                                                ? 'success'
                                                                : 'danger') }}">
                                                        {{ ucfirst($appointment->status) }}
                                                    </span></small>
                                            </div>

                                            <div class="text-right d-flex mb-1 gap-1">
                                                <!-- <button class="btn btn-success">Schedule</button> -->
                                                @if ($appointment->status === 'pending')
                                                    <form action="{{ route('appointments.finish', $appointment->id) }}"
                                                        method="GET">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning">Complete</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Patient Overview -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Patient Overview</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="chart-container">

                                    <canvas id="patientDistribution"></canvas>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="chart-container">
                                    <canvas id="appointmentStatus"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Activity</h6>
                    </div>
                    <div class="card-body">
                        <!-- Scrollable container -->
                        <div class="timeline scrollable-container" style="height: 300px; overflow-y: auto;">
                            @foreach ($recentActivity as $activity)
                                <div class="timeline-item border mb-1 rounded px-1 py-1">
                                    <div class="timeline-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <strong>Patient: {{ $activity->user->fullname }} <small
                                                        class="text-muted"><span
                                                            class="badge bg-{{ $appointment->status === 'pending'
                                                                ? 'warning'
                                                                : ($appointment->status === 'completed'
                                                                    ? 'success'
                                                                    : 'danger') }}">
                                                            {{ ucfirst($appointment->status) }}
                                                        </span></small>
                                                </strong>
                                                <br>
                                                <strong>Report:</strong>
                                                <br>
                                                <p>
                                                    {{ $activity->report }}
                                                </p>
                                                <small
                                                    class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Patient Distribution Chart
            const ctx1 = document.getElementById('patientDistribution').getContext('2d');
            new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: ['New Patients', 'General Checkup', 'Symptom Evaluation', 'Follow-up Visit',
                        'Emergency Cases', 'Others'
                    ],
                    datasets: [{
                        data: [
                            {{ $newPatients->count() }},
                            {{ $generalCheckup->count() }},
                            {{ $symptomEvaluation->count() }},
                            {{ $followUpPatients->count() }},
                            {{ $emergencyCases->count() }},
                            {{ $otherCheckup->count() }},
                        ],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.5)', // blue
                            'rgba(75, 192, 192, 0.5)', // teal
                            'rgba(153, 102, 255, 0.5)', // purple
                            'rgba(255, 159, 64, 0.5)', // orange
                            'rgba(255, 205, 86, 0.5)', // yellow
                            'rgba(201, 203, 207, 0.5)' // gray
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 205, 86, 1)',
                            'rgba(201, 203, 207, 1)'
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

            // Appointment Status Chart
            const ctx2 = document.getElementById('appointmentStatus').getContext('2d');
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['Pending', 'Completed', 'Cancelled'],
                    datasets: [{
                        label: 'Appointments',
                        data: [
                            {{ $pendingAppointments->count() }},
                            {{ $completedAppointments->count() }},
                            {{ $cancelledAppointments->count() }}
                        ],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(255, 99, 132, 0.5)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
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
        });
    </script>
@endsection
