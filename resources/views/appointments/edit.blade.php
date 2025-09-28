<script src="{{ asset('js/toast.js') }}"></script>
<x-layout>
    <div class="bg-body-tertiary ">

        <div class="container mb-5 py-5">
            <main>

                <div class="notify-container" id="notifyContainer">
                </div>

                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Profile Information</span>
                        </h4>
                        <div>
                            <div class="container py-1 card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ Auth::user()->fullname }}</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <i class="bi bi-envelope"></i> {{ Auth::user()->email }}
                                        </li>
                                        <li class="list-group-item">
                                            <i class="bi bi-telephone"></i> +251{{ Auth::user()->phone_number }}
                                        </li>
                                        <li class="list-group-item">
                                            <i class="bi bi-calendar-date"></i> {{ Auth::user()->dob }}
                                        </li>
                                    </ul>
                                    <div class="mt-3">
                                        <a href="{{ route('patient.profile.settings') }}"
                                            class="btn btn-primary me-2">Edit Profile</a>
                                        <button class="btn btn-outline-secondary">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 mb-3 col-lg-8 bg-white rounded">
                        <h3 class="bg-primary py-1 m-2 px-2 text-white rounded">Book Reappointment</h3>
                        <form class="needs-validation" action="{{ route('appointments.create.reappointment') }}"
                            method="post">
                            @csrf
                            @method('PUT')
                            <input type="password" name="patient_id" class="d-none" value="{{ auth()->user()->id }}">
                            <input type="password" name="previous_appointment_id" class="d-none"
                                value="{{ $previousAppointment->id }}">

                            <h4 class="mb-3 py-1 border-3 border-primary border-bottom">Medical Information</h4>
                            <div class="row g-3">
                                <div class="col-md-4 mb-3">
                                    <label for="medicalCondition" class="form-label">Medical Condition</label>
                                    <select name="medical_condition" class="form-select" id="medicalCondition" required>
                                        <option value="">Select Condition</option>
                                        @foreach (['General Checkup', 'Symptom Evaluation', 'Follow-up Visit', 'Other'] as $condition)
                                            <option value="{{ $condition }}"
                                                {{ old('medical_condition', $appointment->medical_condition) == $condition ? 'selected' : '' }}>
                                                {{ $condition }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a medical condition
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="department" class="form-label">Department/Specialist</label>
                                    <select name="department_id" class="form-select" id="department" required>
                                        <option value="">Select Department/Specialist</option>
                                        @foreach ($hospital->department as $department)
                                            <option value="{{ $department->id }}"
                                                {{ old('department_id', $appointment->department_id) == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a department/specialist
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="preferredDoctor" class="form-label">Preferred Doctor</label>
                                    <select name="doctor_id" class="form-select" id="preferredDoctor" required>
                                        <option value="">Select Doctor</option>
                                        @foreach ($hospital->doctor as $doc)
                                            <option value="{{ $doc->id }}"
                                                {{ old('doctor_id', $appointment->doctor_id) == $doc->id ? 'selected' : '' }}>
                                                Dr. {{ $doc->name }} - {{ $doc->department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a doctor
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="reasonVisit" class="form-label">Reason for Visit</label>
                                    <span class="text-body-secondary">(Optional)</span>
                                    <textarea name="reason_for_visit" class="form-control" id="reasonVisit" rows="3"
                                        placeholder="Please describe your symptoms or reason for visit...">{{ old('reason_for_visit', $appointment->reason_for_visit) }}</textarea>
                                </div>

                                <h4 class="mb-3 py-1 border-3 border-primary border-bottom">Appointment Details</h4>

                                <div class="col-md-6 mb-3">
                                    <label for="appointmentDate" class="form-label">Preferred Date</label>
                                    <input name="appointment_date" type="date" class="form-control"
                                        id="appointmentDate"
                                        value="{{ old('appointment_date', $appointment->appointment_date->format('Y-m-d')) }}"
                                        min="{{ date('Y-m-d') }}" required>
                                    <div class="invalid-feedback">
                                        Please select a valid date
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="appointmentTime" class="form-label">Preferred Time</label>
                                    <input name="appointment_time" type="time" class="form-control"
                                        id="appointmentTime"
                                        value="{{ old('appointment_time', $appointment->appointment_date->format('H:i')) }}"
                                        required>
                                    <div class="invalid-feedback">
                                        Please select a valid time
                                    </div>
                                </div>
                                <hr class="my-4">

                                <div class="d-flex gap-1 ">

                                    <button class="w-75 btn btn-primary btn-lg mb-5" type="submit">
                                        Book Reappointment
                                    </button>

                                    <a href="{{ route('myAppointments') }}" class="w-25 btn btn-danger btn-lg mb-5"
                                        type="">
                                        Cancel
                                    </a>
                                </div>

                        </form>
                    </div>
                </div>
            </main>
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

    </div>

</x-layout>
