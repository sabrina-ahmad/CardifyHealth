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
                                <!-- Profile Image -->
                                <!-- <img class="card-img-top" src="profile-picture.jpg" alt="Profile Picture"> -->

                                <!-- Card Content -->
                                <div class="card-body">
                                    <!-- User Information -->
                                    <h5 class="card-title">{{ Auth::user()->fullname }}</h5>
                                    <!-- <h6 class="card-subtitle mb-2 text-muted">Software Developer</h6> -->

                                    <!-- Contact Information -->
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

                                    <!-- Action Buttons -->
                                    <div class="mt-3">
                                        <a href="{{ route('patient.profile.settings') }}"
                                            class="btn btn-primary me-2">Edit Profile</a>
                                        <button class="btn btn-outline-secondary">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <ul class="list-group mb-3"> -->
                        <!--     <li class="list-group-item d-flex justify-content-between lh-sm"> -->
                        <!--         <div> -->
                        <!--             <h6 class="my-0">Product name</h6> -->
                        <!--             <small class="text-body-secondary">Brief description</small> -->
                        <!--         </div> -->
                        <!--         <span class="text-body-secondary">$12</span> -->
                        <!--     </li> -->
                        <!--     <li class="list-group-item d-flex justify-content-between lh-sm"> -->
                        <!--         <div> -->
                        <!--             <h6 class="my-0">Second product</h6> -->
                        <!--             <small class="text-body-secondary">Brief description</small> -->
                        <!--         </div> -->
                        <!--         <span class="text-body-secondary">$8</span> -->
                        <!--     </li> -->
                        <!--     <li class="list-group-item d-flex justify-content-between lh-sm"> -->
                        <!--         <div> -->
                        <!--             <h6 class="my-0">Third item</h6> -->
                        <!--             <small class="text-body-secondary">Brief description</small> -->
                        <!--         </div> -->
                        <!--         <span class="text-body-secondary">$5</span> -->
                        <!--     </li> -->
                        <!--     <li class="list-group-item d-flex justify-content-between bg-body-tertiary"> -->
                        <!--         <div class="text-success"> -->
                        <!--             <h6 class="my-0">Promo code</h6> -->
                        <!--             <small>EXAMPLECODE</small> -->
                        <!--         </div> -->
                        <!--         <span class="text-success">−$5</span> -->
                        <!--     </li> -->
                        <!--     <li class="list-group-item d-flex justify-content-between"> -->
                        <!--         <span>Total (USD)</span> -->
                        <!--         <strong>$20</strong> -->
                        <!--     </li> -->
                        <!-- </ul> -->
                        <!---->
                        <!-- <form class="card p-2"> -->
                        <!--     <div class="input-group"> -->
                        <!--         <input type="text" class="form-control" placeholder="Promo code"> -->
                        <!--         <button type="submit" class="btn btn-secondary">Redeem</button> -->
                        <!--     </div> -->
                        <!-- </form> -->
                    </div>
                    <div class="col-md-7 mb-3 col-lg-8 bg-white rounded">
                        <h3 class="bg-primary py-1 m-2 px-2 text-white rounded">Book Appointment</h3>
                        <form class="needs-validation" action="{{ route('appointments.create.new') }}" method="post">
                            @csrf
                            <!-- <h4 class="mb-3 py-1 border-3 border-primary border-bottom">Patient Information</h4> -->
                            <div class="row g-3">
                                <!--     <div class="col-sm-6"> -->
                                <!--         <label for="fullname" class="form-label">Full name</label> -->
                                <!--         <input type="text" name="fullname" class="form-control" id="fullname" -->
                                <!--             placeholder="" value="" required=""> -->
                                <!--         <div class="invalid-feedback"> -->
                                <!--             Valid full name is required. -->
                                <!--         </div> -->
                                <!--     </div> -->
                                <!---->
                                <!--     <div class="col-sm-6"> -->
                                <!--         <label for="birth" class="form-label">Date of Birth</label> -->
                                <!--         <input type="date" name="birth" class="form-control" id="birth" -->
                                <!--             value="" required=""> -->
                                <!--         <div class="invalid-feedback"> -->
                                <!--             Valid birth date is required. -->
                                <!--         </div> -->
                                <!--     </div> -->
                                <!---->
                                <!--     <div class="col-6"> -->
                                <!--         <label for="email" class="form-label">Email -->
                                <!--         </label> -->
                                <!--         <input type="email" name="email" class="form-control" id="email" -->
                                <!--             placeholder="you@example.com"> -->
                                <!--         <div class="invalid-feedback"> -->
                                <!--             Please enter a valid email address for shipping updates. -->
                                <!--         </div> -->
                                <!--     </div> -->
                                <!---->
                                <!---->
                                <!--     <div class="col-sm-6"> -->
                                <!--         <label for="phone_number" class="form-label">Phone Number</label> -->
                                <!--         <div class="input-group has-validation"> -->
                                <!--             <span class="input-group-text" id="">+251</span> -->
                                <!--             <input type="tel" class="form-control " id="phone_number" -->
                                <!--                 name="phone_number" placeholder="912345678" maxlength="9" required> -->
                                <!--             <div class="invalid-feedback"> -->
                                <!--                 Valid phone number required. -->
                                <!--             </div> -->
                                <!--         </div> -->
                                <!--     </div> -->

                                <h4 class="mb-3 py-1 border-3 border-primary border-bottom">Medical Information</h4>
                                <input type="password" name="patient_id" class="d-none"
                                    value="{{ auth()->user()->id }}">

                                <div class="col-md-4 mb-3">
                                    <label for="medicalCondition" class="form-label">Medical Condition</label>
                                    <select name="medical_condition" class="form-select" id="medicalCondition"
                                        required>
                                        <option value="">Select Condition</option>
                                        @foreach (['General Checkup', 'Symptom Evaluation', 'Follow-up Visit', 'Other'] as $condition)
                                            <option value="{{ $condition }}"
                                                {{ old('medical_condition') == $condition ? 'selected' : '' }}>
                                                {{ $condition }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a medical condition
                                    </div>
                                </div>

                                <!-- Department/Specialist -->
                                <div class="col-md-4 mb-3">
                                    <label for="department" class="form-label">Department/Specialist</label>
                                    <select name="department_id" class="form-select" id="department" required>
                                        <option value="">Select Department/Specialist</option>
                                        @foreach ($hospital->department as $department)
                                            <option value="{{ $department->id }}"
                                                {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a department/specialist
                                    </div>
                                </div>

                                <!-- Preferred Doctor -->
                                <div class="col-md-4 mb-3">
                                    <label for="preferredDoctor" class="form-label">Preferred Doctor</label>
                                    <select name="doctor_id" class="form-select" id="preferredDoctor" required>
                                        <option value="">Select Doctor</option>
                                        @foreach ($hospital->doctor as $doc)
                                            <option value="{{ $doc->id }}"
                                                {{ old('doctor_id') == $doc->id ? 'selected' : '' }}>
                                                Dr. {{ $doc->name }} - {{ $doc->department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a doctor
                                    </div>
                                </div>

                                <!-- Reason for Visit -->
                                <div class="col-md-12 mb-3">
                                    <label for="reasonVisit" class="form-label">Reason for Visit</label>
                                    <span class="text-body-secondary">(Optional)</span>
                                    <textarea name="reason_for_visit" class="form-control" id="reasonVisit" rows="3"
                                        placeholder="Please describe your symptoms or reason for visit...">{{ old('reason_for_visit') }}</textarea>
                                </div>

                                <!-- Appointment Details -->
                                <h4 class="mb-3 py-1 border-3 border-primary border-bottom">Appointment Details</h4>

                                <!-- Date -->
                                <div class="col-md-6 mb-3">
                                    <label for="appointmentDate" class="form-label">Preferred Date</label>
                                    <input name="appointment_date" type="date" class="form-control"
                                        id="appointmentDate" value="{{ old('appointment_date') }}"
                                        min="{{ date('Y-m-d') }}" required>
                                    <div class="invalid-feedback">
                                        Please select a valid date
                                    </div>
                                </div>

                                <!-- Time -->
                                <div class="col-md-6 mb-3">
                                    <label for="appointmentTime" class="form-label">Preferred Time</label>
                                    <input name="appointment_time" type="time" class="form-control"
                                        id="appointmentTime" value="{{ old('appointment_time') }}" required>
                                    <div class="invalid-feedback">
                                        Please select a valid time
                                    </div>
                                </div>


                            </div>

                            <hr class="my-4">
                            <!---->
                            <!-- <div class="form-check"> -->
                            <!--     <input type="checkbox" class="form-check-input" id="same-address"> -->
                            <!--     <label class="form-check-label" for="same-address">Shipping address is the -->
                            <!--         same as my -->
                            <!--         billing -->
                            <!--         address</label> -->
                            <!-- </div> -->
                            <!---->
                            <!-- <div class="form-check"> -->
                            <!--     <input type="checkbox" class="form-check-input" id="save-info"> -->
                            <!--     <label class="form-check-label" for="save-info">Save this information for next -->
                            <!--         time</label> -->
                            <!-- </div> -->
                            <!---->
                            <!-- <hr class="my-4"> -->
                            <!---->
                            <!-- <h4 class="mb-3">Payment</h4> -->
                            <!---->
                            <!-- <div class="my-3"> -->
                            <!--     <div class="form-check"> -->
                            <!--         <input id="credit" name="paymentMethod" type="radio" -->
                            <!--             class="form-check-input" checked="" required=""> -->
                            <!--         <label class="form-check-label" for="credit">Credit card</label> -->
                            <!--     </div> -->
                            <!--     <div class="form-check"> -->
                            <!--         <input id="debit" name="paymentMethod" type="radio" -->
                            <!--             class="form-check-input" required=""> -->
                            <!--         <label class="form-check-label" for="debit">Debit card</label> -->
                            <!--     </div> -->
                            <!--     <div class="form-check"> -->
                            <!--         <input id="paypal" name="paymentMethod" type="radio" -->
                            <!--             class="form-check-input" required=""> -->
                            <!--         <label class="form-check-label" for="paypal">PayPal</label> -->
                            <!--     </div> -->
                            <!-- </div> -->
                            <!---->
                            <!-- <div class="row gy-3"> -->
                            <!--     <div class="col-md-6"> -->
                            <!--         <label for="cc-name" class="form-label">Name on card</label> -->
                            <!--         <input type="text" class="form-control" id="cc-name" placeholder="" -->
                            <!--             required=""> -->
                            <!--         <small class="text-body-secondary">Full name as displayed on card</small> -->
                            <!--         <div class="invalid-feedback">Name on card is required</div> -->
                            <!--     </div> -->
                            <!---->
                            <!--     <div class="col-md-6"> -->
                            <!--         <label for="cc-number" class="form-label">Credit card number</label> -->
                            <!--         <input type="text" class="form-control" id="cc-number" placeholder="" -->
                            <!--             required=""> -->
                            <!--         <div class="invalid-feedback"> -->
                            <!--             Credit card number is required -->
                            <!--         </div> -->
                            <!--     </div> -->
                            <!---->
                            <!--     <div class="col-md-3"> -->
                            <!--         <label for="cc-expiration" class="form-label">Expiration</label> -->
                            <!--         <input type="text" class="form-control" id="cc-expiration" placeholder="" -->
                            <!--             required=""> -->
                            <!--         <div class="invalid-feedback">Expiration date required</div> -->
                            <!--     </div> -->
                            <!---->
                            <!--     <div class="col-md-3"> -->
                            <!--         <label for="cc-cvv" class="form-label">CVV</label> -->
                            <!--         <input type="text" class="form-control" id="cc-cvv" placeholder="" -->
                            <!--             required=""> -->
                            <!--         <div class="invalid-feedback">Security code required</div> -->
                            <!--     </div> -->
                            <!-- </div> -->
                            <!---->
                            <!-- <hr class="my-4"> -->

                            <button class="w-100 btn btn-primary btn-lg mb-5" type="submit">
                                Book Appointment
                            </button>
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
