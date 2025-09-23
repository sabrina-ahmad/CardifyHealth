    <script src="{{ asset('js/toast.js') }}"></script>
    <x-layout :title="'Dashboard'">
        <div class="container mt-5">
            <div class="row">
                <!-- Welcome Section -->
                <div class="col-md-4 mb-4">

                    <div class="card border-primary shadow-sm">
                        <div class="card-body">
                            <h1>Welcome, {{ auth()->user()->fullname }} 🎉</h1>
                            <p>Your role: {{ auth()->user()->role }}</p>
                            @if (auth()->user()->role === 'patient')
                                <a href="{{ route('appointments.create') }}" class="btn btn-primary w-100 mt-3">
                                    Book New Appointment
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Appointment List -->
                <div class="col-md-8">
                    <div class="card border-primary shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h3>Your Appointments</h3>
                        </div>

                        <div class="card-body">


                            @forelse($appointments as $appointment)
                                <div
                                    class="card mb-3 border-left-{{ $appointment->status === 'pending'
                                        ? 'warning'
                                        : ($appointment->status === 'completed'
                                            ? 'success'
                                            : 'danger') }}">
                                    <div class="card-body">
                                        <h5 class="card-title">Dr. {{ $appointment->doctor->name }}</h5>
                                        <p class="card-text">
                                            Department: {{ $appointment->doctor->department->name }}
                                        </p>
                                        <p class="card-text">
                                            Date : {{ $appointment->appointment_date }}

                                        </p>
                                        <p class="card-text">
                                            Time : {{ $appointment->appointment_time }}
                                        </p>
                                        <p class="card-text">
                                            Status: <span
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
                            @empty
                                <p class="text-center text-muted py-5">No appointments scheduled yet.</p>
                            @endforelse
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
