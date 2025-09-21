<x-layout :title="'Register'">
    <div class="container mt-5 mb-5 mt-5 p-5 ">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-4 col-lg-6">

                <!-- Nav Tabs -->
                <ul class="nav nav-tabs" id="registerTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="hospital-tab" data-bs-toggle="tab" data-bs-target="#hospital"
                            type="button" role="tab" aria-controls="hospital" aria-selected="true">
                            Hospital Register
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="patient-tab" data-bs-toggle="tab" data-bs-target="#patient"
                            type="button" role="tab" aria-controls="patient" aria-selected="false">
                            Patient Register
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content p-4 border border-top-0 rounded-bottom bg-white shadow-sm"
                    id="registerTabContent">

                    <!-- Hospital Form -->
                    <div class="tab-pane fade show active" id="hospital" role="tabpanel"
                        aria-labelledby="hospital-tab">
                        <form method="POST" action="{{ route('register.hospital') }} " id="form-id">

                            @csrf

                            <div class="mb-3">
                                <label for="hospital_name" class="form-label">Hospital Name</label>
                                <input type="text" class="form-control" id="hospital_name" name="hospital_name"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="license_number" class="form-label">License Number</label>
                                <input type="text" class="form-control" id="license_number" name="license_number"
                                    required>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12">

                                    <label for="contact_person" class="form-label">Contact Person</label>
                                    <input type="text" class="form-control" id="contact_person" aria-describedby=""
                                        name="contact_person" required>
                                </div>
                                <!-- </div> -->
                                <!---->
                                <!-- <div class="mb-3"> -->
                                <div class="col-lg-6 col-sm-12">
                                    <label for="phone_number" class="form-label">Phone Number</label>

                                    <div class="input-group">
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="">+251</span>
                                            <input type="text" class="form-control " id="phone_number"
                                                name="phone_number" placeholde="912345678" maxlength="9" required>
                                            <div class="invalid-feedback">
                                                Please check your phone number.
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12">

                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <div class="passwordError my-2">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" required>
                                    <div class="confirmError my-2">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="role" value="hospital">

                            <button type="submit" class="btn btn-primary w-100">Register Hospital</button>
                        </form>

                    </div>


                    <!-- Patient Register Tab -->
                    <div class="tab-pane fade" id="patient" role="tabpanel" aria-labelledby="patient-tab">
                        <form method="POST" action="{{ route('register.patient') }}" id="form-id"> @csrf

                            <div class="row">

                                <!-- Full Name -->
                                <div class="col-6 mb-3">
                                    <label for="fullname" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="fullname" id="fullname"
                                        required>
                                </div>

                                <!-- Username -->
                                <div class="col-6 mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username"
                                        required>
                                </div>

                                <!-- Phone Number -->
                                <div class="col-6 mb-3">
                                    <label for="phone_number" class="form-label">Phone Number</label>

                                    <div class="input-group">
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="">+251</span>
                                            <input type="text" class="form-control " id="phone_number"
                                                name="phone_number" placeholde="912345678" maxlength="9" required>
                                            <div class="invalid-feedback">
                                                Please check your phone number.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        required>
                                </div>

                                <!-- Password -->
                                <div class="col-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        required>
                                </div>

                                <input type="hidden" name="role" value="patient">

                                <!-- Password Confirmation -->
                                <div class="col-6 mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirmation" required>
                                </div>

                            </div>

                            <!-- Hidden Role -->

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success w-100">Register Patient</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="notify-container" id="notifyContainer">
        </div>
        <script src="{{ asset('js/validateForm.js') }}"></script>
</x-layout>
