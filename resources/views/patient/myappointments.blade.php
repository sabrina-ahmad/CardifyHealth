@php
    $user = auth()->user();
    $recentAppointments = $appointments->sortByDesc('appointment_date')->take(5);
    $pendingAppointments = $appointments->where('status', 'pending');
    $completedAppointments = $appointments->where('status', 'completed');
    $cancelledAppointments = $appointments->where('status', 'cancelled');
@endphp

<x-layout :title="'My Appointments'">
    <div class="container mt-3 py-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">My Appointments</h2>
                <div class="row">
                    <!-- Total Appointments -->
                    <div class="col-6 col-md-3">
                        <div class="card bg-primary text-white mb-2">
                            <div class="card-body py-2">
                                <h5 class="card-title">Total</h5>
                                <p class="card-text">{{ count($appointments) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Appointments -->
                    <div class="col-6 col-md-3">
                        <div class="card bg-success text-white mb-2">
                            <div class="card-body py-2">
                                <h5 class="card-title">Upcoming</h5>
                                <p class="card-text">{{ $pendingAppointments->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Completed Appointments -->
                    <div class="col-6 col-md-3">
                        <div class="card bg-warning text-white mb-2">
                            <div class="card-body py-2">
                                <h5 class="card-title">Completed</h5>
                                <p class="card-text">{{ $completedAppointments->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Cancelled Appointments -->
                    <div class="col-6 col-md-3">
                        <div class="card bg-danger text-white mb-2">
                            <div class="card-body py-2">
                                <h5 class="card-title">Cancelled</h5>
                                <p class="card-text">{{ $cancelledAppointments->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Recent Appointments Section -->
            <div class="col-md-6">
                <h3 class="mb-3">Recent Appointments</h3>

                <!-- Box container with border and padding -->
                <div class="border rounded shadow-sm p-3">
                    <!-- Scrollable container -->
                    <div class="d-flex flex-column flex-nowrap overflow-auto" style="height: 400px;">

                        @if ($recentAppointments->count() > 0)
                            @foreach ($recentAppointments as $appointment)
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="card-title mb-0">Recent Appointment</h5>
                                            @if ($appointment->status === 'pending')
                                                <div class="d-flex gap-2">
                                                    <form action="{{ route('appointments.cancel', $appointment->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to cancel this appointment?')">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            Cancel Appointment
                                                        </button>
                                                    </form>

                                                    <form
                                                        action="{{ route('appointments.edit', ['appointment' => $appointment->id]) }}"
                                                        method="GET">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-primary">
                                                            Edit Appointment
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Date:</strong>
                                                    {{ $appointment->appointment_date->format('m-d-Y') }}
                                                    {{ $appointment->appointment_date->format('h:i A') }}</p>
                                                <p><strong>Medical Condition:</strong>
                                                    {{ $appointment->medical_condition }}</p>
                                                <p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Department:</strong> {{ $appointment->department->name }}
                                                </p>
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
            </div>

            <!-- Status-Based Sections -->
            <!-- Pending Appointments -->
            <div class="col-md-6">
                <h3 class="mb-3">Pending Appointments</h3>

                <!-- Scrollable box container -->
                <div class="border rounded shadow-sm p-3">
                    <div class="d-flex flex-column flex-nowrap overflow-auto" style="height: 400px;">

                        @if ($pendingAppointments->count() > 0)
                            @foreach ($pendingAppointments as $appointment)
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="card-title mb-0">Pending Appointment</h5>
                                            <div class="d-flex gap-2">
                                                <form action="{{ route('appointments.cancel', $appointment->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to cancel this appointment?')">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        Cancel Appointment
                                                    </button>
                                                </form>


                                                <form
                                                    action="{{ route('appointments.edit', ['appointment' => $appointment->id]) }}"
                                                    method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        Edit Appointment
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Date:</strong>
                                                    {{ $appointment->appointment_date->format('m-d-Y') }}
                                                    {{ $appointment->appointment_date->format('h:i A') }}</p>
                                                <p><strong>Medical Condition:</strong>
                                                    {{ $appointment->medical_condition }}</p>
                                                <p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Department:</strong> {{ $appointment->department->name }}
                                                </p>
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
                </div>
            </div>

            <!-- Completed Appointments -->
            <div class="col-md-6 mt-5">
                <h3 class="mb-3">Completed Appointments</h3>

                <!-- Scrollable box container -->
                <div class="border rounded shadow-sm p-3">
                    <div class="d-flex flex-column flex-nowrap overflow-auto" style="height: 400px;">

                        @if ($completedAppointments->count() > 0)
                            @foreach ($completedAppointments as $appointment)
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="card-title mb-0">Completed Appointment</h5>
                                            <!-- <a href="{{ route('appointments.cancel', $appointment->id) }}" -->
                                            <!--     class="btn btn-sm btn-primary"> -->
                                            <!--     View Details -->
                                            <!-- </a> -->
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Date:</strong>
                                                    {{ $appointment->appointment_date->format('m-d-Y') }}
                                                    {{ $appointment->appointment_date->format('h:i A') }}</p>
                                                <p><strong>Medical Condition:</strong>
                                                    {{ $appointment->medical_condition }}</p>
                                                <p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Department:</strong> {{ $appointment->department->name }}
                                                </p>
                                                <p><strong>Reason:</strong> {{ $appointment->reason_for_visit }}</p>
                                                <p><strong>Status:</strong>
                                                    <span class="badge bg-success">
                                                        {{ ucfirst($appointment->status) }}
                                                    </span>
                                                </p>
                                            </div>

                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            Appointment Report
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            {{ $appointment->report ?? 'No report' }} </div>
                                                    </div>
                                                </div>
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

            <div class="col-md-6 mt-5">
                <h3 class="mb-3">Cancelled Appointments</h3>

                <!-- Scrollable box container -->
                <div class="border rounded shadow-sm p-3">
                    <div class="d-flex flex-column flex-nowrap overflow-auto" style="height: 400px;">

                        @if ($cancelledAppointments->count() > 0)
                            @foreach ($cancelledAppointments as $appointment)
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="card-title mb-0">Completed Appointment</h5>
                                            <!-- <a href="{{ route('appointments.cancel', $appointment->id) }}" -->
                                            <!--     class="btn btn-sm btn-primary"> -->
                                            <!--     View Details -->
                                            <!-- </a> -->
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Date:</strong>
                                                    {{ $appointment->appointment_date->format('m-d-Y') }}
                                                    {{ $appointment->appointment_date->format('h:i A') }}</p>
                                                <p><strong>Medical Condition:</strong>
                                                    {{ $appointment->medical_condition }}</p>
                                                <p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Department:</strong> {{ $appointment->department->name }}
                                                </p>
                                                <p><strong>Reason:</strong> {{ $appointment->reason_for_visit }}</p>
                                                <p><strong>Status:</strong>
                                                    <span class="badge bg-danger">
                                                        {{ ucfirst($appointment->status) }}
                                                    </span>
                                                </p>
                                            </div>

                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            Appointment Report
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne" class="accordion-collapse collapse"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            {{ $appointment->report ?? 'No report' }} </div>
                                                    </div>
                                                </div>
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

        </div>
    </div>
    <script src="{{ asset('js/toast.js') }}"></script>

    @if (session('success'))
        <div class="notify-container" id="notifyContainer">
        </div>
        <script>
            // showToast("{{ session('success') }}", "info")
            showNotify(
                "<i class='bi bi-check-circle-fill text-white'></i> <span class='text-white'>{{ session('success') }}<span>",
                'info', 5000)
        </script>
    @endif


    @if (session('error'))
        <div class="notify-container" id="notifyContainer">
        </div>
        <script>
            // showToast("{{ session('error') }}", "error")
            showNotify("<i class='bi bi-x-circle text-dark'></i> <span class='text-dark'>{{ session('error') }}<span>",
                'error', 5000)
        </script>
    @endif

    @if (session('warning'))
        <div class="notify-container" id="notifyContainer">
        </div>
        <script>
            // showToast("{{ session('warning') }}", "warning")
            showNotify(
                "<i class='bi bi-exclamation-circle-fill text-dark'></i> <span class='text-dark'>{{ session('warning') }}<span>",
                'warning', 5000)
        </script>
    @endif

    @if ($errors->any())
        <div class="notify-container" id="notifyContainer">
        </div>

        <script>
            showNotify(
                "<strong>Error!</strong> <br> <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>",
                "error", 5000)
        </script>
    @endif
</x-layout>
