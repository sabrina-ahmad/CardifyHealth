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
                                    Does the health center provide pharmacy services for patients?
                                </button>
                            </h2>
                            <div id="pharmacy" class="accordion-collapse collapse" aria-labelledby="pharmacyHeader">
                                <div class="accordion-body">
                                    Yes
                                </div>
                            </div>
                        </div>

                        <!-- Vaccination Services -->
                        <div class="accordion-item border rounded mb-2">
                            <h2 class="accordion-header" id="vaccinationHeader">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#vaccination" aria-expanded="false" aria-controls="vaccination">
                                    Are vaccination services available at the health center?
                                </button>
                            </h2>
                            <div id="vaccination" class="accordion-collapse collapse"
                                aria-labelledby="vaccinationHeader">
                                <div class="accordion-body">
                                    Yes (available during morning hours)
                                </div>
                            </div>
                        </div>

                        <!-- Emergency Services -->
                        <div class="accordion-item border rounded mb-2">
                            <h2 class="accordion-header" id="emergencyHeader">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#emergency" aria-expanded="false" aria-controls="emergency">
                                    Does the health center have emergency services to handle urgent cases?
                                </button>
                            </h2>
                            <div id="emergency" class="accordion-collapse collapse" aria-labelledby="emergencyHeader">
                                <div class="accordion-body">
                                    Yes (ambulance service available)
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
