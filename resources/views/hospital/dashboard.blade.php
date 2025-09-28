<x-hospital>
    <div class="container px-0 mx-0">
        <div class="row flex-nowrap">
            <x-hside>
            </x-hside>
            <div class="container py-5 mt-5">
                <h1>Welcome, {{ $hospital->hospital_name ?? 'Hospital' }}</h1>
                <p>Status: <strong>{{ $hospital->status }}</strong></p>

                @if ($hospital->status === 'pending')
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-octagon-fill"></i>
                        Your account is pending approval by the admin.
                    </div>
                @elseif($hospital->status === 'approved' && $hospital->first_time === true)
                    <div class="alert alert-success d-flex gap-1 alert-dismissible fade show" role="alert">

                        <i class="bi bi-info-circle-fill"></i>
                        <div>
                            Your hospital is approved. You can now manage appointments and doctors!
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @php
                        $hospital->first_time = false;
                        $hospital->save();
                    @endphp
                @endif


                <div class="container-fluid">

                    <!-- Statistics Cards -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
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
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Active Doctors</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $stats['active_doctors'] }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
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
                                                Inactive Doctors</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $stats['inactive_doctors'] }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-times fa-2x text-gray-300"></i>
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
                        <div class="col- mb-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Doctor Status Distribution</h6>
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
                                            <a href="{{ route('hospital.doctors') }}" class="btn btn-primary btn-block">
                                                <i class="fas fa-user-md mr-2"></i> Manage Doctors
                                            </a>
                                        </div>
                                        <div class="col-lg-6 mb-4">
                                            <a href="{{ route('hospital.departments') }}"
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Doctor Status Chart
        const ctx = document.getElementById('doctorChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($doctorData['labels']),
                datasets: [{
                    label: 'Doctor Status Distribution',
                    data: @json($doctorData['values']),
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
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
    </script>
</x-hospital>
