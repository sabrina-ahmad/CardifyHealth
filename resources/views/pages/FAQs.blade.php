<x-layout :title="'FAQs'">

    <div class="bg-body-white">
        <div class="container col-12 mb-5 py-5">
            <!-- Hero Section -->
            <div class="row mb-5">
                <div class="col-md-6">
                    <h1 class="display-4 mb-3">Frequently Asked Questions</h1>
                    <p class="lead text-muted">
                        Find answers to common questions about our health center services and facilities
                    </p>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="card bg-primary text-white border-0">
                        <div class="card-body">
                            <h3 class="card-title mb-2">Quick Facts</h3>
                            <ul class="list-unstyled">
                                <li>24/7 Emergency Services</li>
                                <li>Online Appointment Booking</li>
                                <li>Multiple Payment Options</li>
                                <li>Preferred Doctor Selection</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Section -->
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="card bg-primary text-white border-0">
                        <div class="card-body">
                            <h3 class="card-title mb-2">Medical Services</h3>
                            <ul class="list-unstyled">
                                <li>Pharmacy Services</li>
                                <li>Vaccination Services</li>
                                <li>Emergency Services</li>
                                <li>Doctor Consultations</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="accordion accordion-flush" id="servicesAccordion">
                        <!-- Pharmacy Services -->
                        <div class="accordion-item border rounded mb-2">
                            <h2 class="accordion-header" id="pharmacyHeader">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#pharmacy" aria-expanded="false" aria-controls="pharmacy">
                                    Where can I find my account settings?
                                </button>
                            </h2>
                            <div id="pharmacy" class="accordion-collapse collapse" aria-labelledby="pharmacyHeader">
                                <div class="accordion-body">
                                    You can access your account settings by clicking on the profile icon located on the
                                    top right corner of the navigation bar. From there, you can manage your personal
                                    information, update your Telebirr number, and adjust notification preferences.
                                </div>
                            </div>
                        </div>

                        <!-- Vaccination Services -->
                        <div class="accordion-item border rounded mb-2">
                            <h2 class="accordion-header" id="vaccinationHeader">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#vaccination" aria-expanded="false" aria-controls="vaccination">
                                    What payment methods are supported?
                                </button>
                            </h2>
                            <div id="vaccination" class="accordion-collapse collapse"
                                aria-labelledby="vaccinationHeader">
                                <div class="accordion-body">
                                    Cardify Health currently supports payments through Telebirr. You can update or
                                    change your Telebirr phone number in your account settings. Whenever you book a new
                                    appointment, the system will remind you to verify or update your payment number if
                                    needed.
                                </div>
                            </div>
                        </div>

                        <!-- Emergency Services -->
                        <div class="accordion-item border rounded mb-2">
                            <h2 class="accordion-header" id="emergencyHeader">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#emergency" aria-expanded="false" aria-controls="emergency">
                                    What should I do if I face booking issues?
                                </button>
                            </h2>
                            <div id="emergency" class="accordion-collapse collapse" aria-labelledby="emergencyHeader">
                                <div class="accordion-body">
                                    If you encounter any problems while booking an appointment, please double-check that
                                    all required fields are filled correctly. If the issue persists, Cardify will
                                    display a helpful notification (toast message) guiding you on what to fix or change.
                                    You can also contact our support team for further assistance.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border rounded mb-2">
                            <h2 class="accordion-header" id="hostpialreliableHeader">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#hostpialreliable" aria-expanded="false"
                                    aria-controls="hostpialreliable">
                                    How reliable are the hospitals listed on Cardify Health?
                                </button>
                            </h2>
                            <div id="hostpialreliable" class="accordion-collapse collapse"
                                aria-labelledby="hostpialreliable">
                                <div class="accordion-body">
                                    We only partner with verified and trusted hospitals. The hospitals shown on the
                                    appointments page are actively available and are ranked based on current
                                    availability and reliability to ensure the best service for our users.
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item border rounded mb-2">
                            <h2 class="accordion-header" id="appointmentEditHeader">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#appointmentEdit" aria-expanded="false"
                                    aria-controls="appointmentEdit">
                                    Can I reschedule or cancel my appointments?
                                </button>
                            </h2>
                            <div id="appointmentEdit" class="accordion-collapse collapse"
                                aria-labelledby="appointmentEdit">
                                <div class="accordion-body">
                                    Yes, you can reschedule or cancel any pending appointment directly from your
                                    dashboard. Just go to your appointments section and select the option to modify or
                                    delete the booking.
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item border rounded mb-2">
                            <h2 class="accordion-header" id="accidentalappointemntHeader">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accidentalappointemnt" aria-expanded="false"
                                    aria-controls="accidentalappointemnt">
                                    What happens if I accidentally book two appointments at the same time?
                                </button>
                            </h2>
                            <div id="accidentalappointemnt" class="accordion-collapse collapse"
                                aria-labelledby="accidentalappointemnt">
                                <div class="accordion-body">
                                    Cardify Health automatically checks for overlapping appointments. If there's a time
                                    conflict, you’ll receive an instant notification (toast alert) before confirming
                                    your booking. This helps you avoid double-booking and gives you a chance to pick a
                                    different time.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Operating Hours Section -->
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="card bg-light border-0">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Operating Hours</h3>
                            <p class="text-muted">
                                Open 24 hours throughout the week
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-light border-0">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Payment Information</h3>
                            <p class="text-muted">
                                You can use telebirr or cash for booking and services (web-telebirr)
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doctor Selection Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-primary text-white border-0">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Doctor Selection</h3>
                            <p class="text-muted">
                                Yes, patients have the option to choose or request a preferred doctor at the health
                                center
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
