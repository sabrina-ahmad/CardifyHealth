@php
    $authUser = Auth::user();
@endphp
<x-hospital>
    <!-- Add viewport meta tag -->

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Responsive Side Panel -->
            <x-hside class="d-none d-md-block col-md-3 col-lg-2">
                <!-- Side panel content -->
            </x-hside>

            <!-- Main Content Area -->
            <div class="container py-5 mt-5 col-8 col-sm-7 col-md-9 col-lg-10">
                <section id="register" class="mx-3">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Register New Doctor</h3>
                        </div>
                        <div class="card-body">
                            <form id="doctorRegisterForm" action="{{ route('hospital.doctors.register') }}"
                                method="post">
                                @csrf
                                <input class="d-none" name="hospital_id" value="{{ $authUser->id }}" type="password">
                                <div class="row g-3">
                                    <div class="col-sm-6 mb-3">
                                        <label for="doctorName" class="form-label">Doctor Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control" id="doctorName" required>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="doctorEmail" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="doctorEmail"
                                            required>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="specialty" class="form-label">Specialty</label>
                                        <input type="text" name="specialty" class="form-control" id="specialty"
                                            required>
                                    </div>

                                    <div class="col-sm-6 mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <select name="department_id" class="form-select" id="department" required>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary">Register Doctor</button>
                            </form>
                        </div>
                    </div>
                </section>

                <!-- View Doctors Section -->
                <section id="view-doctors" class="mx-3">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Registered Doctors</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="d-none d-sm-table-cell">No</th>
                                            <th class="d-none d-sm-table-cell">Name</th>
                                            <th class="d-none d-sm-table-cell">Email</th>
                                            <th class="d-none d-xl-table-cell">Specialty</th>
                                            <th class="d-none d-xl-table-cell">Department</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="doctorsList">
                                        <!-- Dynamic content will be inserted here -->
                                        @foreach ($doctors as $doctor)
                                            @if ($authUser->id === $doctor->hospital_id)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $doctor->name }}</td>
                                                    <td>{{ $doctor->email }}</td>
                                                    <td>{{ $doctor->specialty }}</td>
                                                    @if ($doctor->department && $doctor->department->name != null)
                                                        <td>{{ $doctor->department->name }}</td>
                                                    @else
                                                        <td>No department</td>
                                                    @endif
                                                    <td>

                                                        <form
                                                            action="{{ route('hospital.doctors.delete', $doctor->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fa-solid fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-hospital>
