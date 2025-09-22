<x-layout>
    <main class="d-flex flex-column z-2 position-relative">
        <section class="vh-70 bg-light-blue">
            <div class="container mt-5 row align-items-center">
                <div class="col-lg-6 mx-auto">
                    <h1 class="display-4 fw-bold text-primary">Cardify Health</h1>
                    <h2 class="display-4 fw-bold text-body-emphasis">Connect. Care. Cure</h2>
                    <p class="lead mt-2 fw-normal text-secondary">
                        Welcome to Cardify Health — where you can find the right doctor and book appointments instantly.
                        Whether you need a general checkup, a specialist consultation, or urgent care, Cardify helps
                        you find the right doctor closest to you.
                    </p>
                    <div class="mt-5 mb-5">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 me-sm-3">Get Started</a>
                        <a href="#Demo" class="btn btn-light btn-lg px-4 me-sm-3">Watch Demo</a>
                    </div>
                </div>

                <div class="col-lg-5 text-center p-3">
                    <!-- <img src="./assets/images/image.png" alt="Doctor" class="img-fluid" style="max-height: 60vh;"> -->
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="{{ asset('images/hero-medical-1.jpg') }}" class="d-block w-100 rounded"
                                    alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="{{ asset('images/hero-medical-2.jpg') }}" class="d-block w-100 rounded"
                                    alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="{{ asset('images/hero-medical-3.webp') }}" class="d-block w-100 rounded"
                                    alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class=" bg-light py-5">

            <h2 class="text-center fw-bold">Powerful Features for Modern Healthcare</h2>
            <p class="text-center text-body-tertiary fw-medium">
                Everything you need to manage healthcare operations efficiently and securely
            </p>

            <div class="row gap-2 justify-content-center mx-sm-5">
                <div class="card col-lg-3 col-md-3 col-sm-10  border-info shadow">
                    <div class="card-body my-3">
                        <span class=" text-light btn-gradient-primary py-3 px-3 text-start rounded-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-shield" viewBox="0 0 16 16">
                                <path
                                    d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                            </svg>
                        </span>
                        <h5 class="card-title mt-3">Multi-Role Authentication</h5>
                        <p class="card-text text-body-secondary">Secure access for Admins, Hospitals, and Patients with
                            approval workflows.
                        </p>

                    </div>
                </div>
                <div class="card col-lg-3 col-md-3 col-sm-12 border-info shadow">
                    <div class="card-body my-3">
                        <span class=" text-light btn-gradient-primary py-3 px-3 text-start rounded-3">
                            <i class="bi bi-activity"></i>
                        </span>
                        <h5 class="card-title mt-3">Real-Time Dashboards</h5>
                        <p class="card-text text-body-secondary">Comprehensive dashboards with key metrics and activity
                            tracking
                        </p>

                    </div>
                </div>
                <div class="card col-lg-3 col-md-3 col-sm-12  border-info shadow">
                    <div class="card-body my-3">
                        <span class=" text-light btn-gradient-primary py-3 px-3 text-start rounded-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                                <path
                                    d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z" />
                                <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z" />
                                <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z" />
                                <path
                                    d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z" />
                                <path d="M12 9h2V8h-2z" />
                            </svg>
                        </span>
                        <h5 class="card-title mt-3">Digital Patient ID Cards</h5>
                        <p class="card-text text-body-secondary">Unique digital ID cards with QR codes for instant
                            verification
                        </p>

                    </div>
                </div>

                <div class="card col-lg-3 col-md-3 col-sm-12  border-info shadow">
                    <div class="card-body my-3">
                        <span class=" text-light btn-gradient-primary py-3 px-3 text-start rounded-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-calendar4" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
                            </svg>
                        </span>
                        <h5 class="card-title mt-3">Appointment Management</h5>
                        <p class="card-text text-body-secondary">Book, reschedule, and manage appointments seamlessly
                        </p>

                    </div>
                </div>

                <div class="card col-lg-3 col-md-3 col-sm-12  border-info shadow">
                    <div class="card-body my-3">
                        <span class=" text-light btn-gradient-primary py-3 px-3 text-start rounded-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-database" viewBox="0 0 16 16">
                                <path
                                    d="M4.318 2.687C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4c0-.374.356-.875 1.318-1.313M13 5.698V7c0 .374-.356.875-1.318 1.313C10.766 8.729 9.464 9 8 9s-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777A5 5 0 0 0 13 5.698M14 4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13zm-1 4.698V10c0 .374-.356.875-1.318 1.313C10.766 11.729 9.464 12 8 12s-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777A5 5 0 0 0 13 8.698m0 3V13c0 .374-.356.875-1.318 1.313C10.766 14.729 9.464 15 8 15s-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13s3.022-.289 4.096-.777c.324-.147.633-.323.904-.525" />
                            </svg>
                        </span>
                        <h5 class="card-title mt-3">Medical Data Transfer</h5>
                        <p class="card-text text-body-secondary">Secure transfer of medical records between hospitals
                            with consent
                        </p>

                    </div>
                </div>

                <div class="card col-lg-3 col-md-3 col-sm-12  border-info shadow">
                    <div class="card-body my-3">
                        <span class=" text-light btn-gradient-primary py-3 px-3 text-start rounded-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-lock" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4M4.5 7A1.5 1.5 0 0 0 3 8.5v5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 11.5 7zM8 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3" />
                            </svg>
                        </span>
                        <h5 class="card-title mt-3">HIPAA Compliant</h5>
                        {{-- <h6 class="card-subtitle mb-2 text-body-secondary">Multi-Role Authentication</h6> --}}
                        <p class="card-text text-body-secondary">Enterprise-grade security for sensitive medical
                            information
                        </p>

                    </div>
                </div>
            </div>

            </div>
        </section>
        <section class="bg-white py-5 mx-sm-5">
            <h2 class="text-center fw-bold">Three Roles, One Platform</h2>
            <p class="text-center text-body-tertiary fw-medium">
                Tailored experiences for every user type in the healthcare ecosystem
            </p>
            <div class="row gap-2 justify-content-center text-center">
                {{-- <div class=""> --}}
                <div class="card col-lg-3 col-sm-12  border-light shadow">
                    <div class="card-body my-3">
                        <span class=" text-light btn-gradient-primary py-3 px-3 text-start rounded-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="currentColor" class="bi bi-shield" viewBox="0 0 16 16">
                                <path
                                    d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                            </svg>
                        </span>
                        <h5 class="card-title mt-3">Admin</h5>
                        <p class="card-text text-body-secondary">Review hospital licenses and approve registrations
                        </p>

                    </div>
                </div>
                <div class="card col-lg-3 col-sm-12 border-light shadow">
                    <div class="card-body my-3">
                        <span class=" text-light btn-gradient-primary py-3 px-3 text-start rounded-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                                <path
                                    d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022M6 8.694 1 10.36V15h5zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5z" />
                                <path
                                    d="M2 11h1v1H2zm2 0h1v1H4zm-2 2h1v1H2zm2 0h1v1H4zm4-4h1v1H8zm2 0h1v1h-1zm-2 2h1v1H8zm2 0h1v1h-1zm2-2h1v1h-1zm0 2h1v1h-1zM8 7h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zM8 5h1v1H8zm2 0h1v1h-1zm2 0h1v1h-1zm0-2h1v1h-1z" />
                            </svg>
                        </span>
                        <h5 class="card-title mt-3">Hospital</h5>
                        <p class="card-text text-body-secondary">Manage doctors, patients, and appointments
                        </p>

                    </div>
                </div>
                <div class="card col-lg-3 col-sm-12  border-light shadow">
                    <div class="card-body my-3">
                        <span class=" text-light btn-gradient-primary py-3 px-3 text-start rounded-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="currentColor" class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                                <path
                                    d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z" />
                                <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z" />
                                <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z" />
                                <path
                                    d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z" />
                                <path d="M12 9h2V8h-2z" />
                            </svg>
                        </span>
                        <h5 class="card-title mt-3">Hospital</h5>
                        <p class="card-text text-body-secondary">Access medical records and manage appointments
                        </p>

                    </div>
                </div>

            </div>
            <div id="Demo"></div>
        </section>
        <section class="bg-light p-5">
            <div class="row justify-content-center  ">
                <div class="col-lg-6 col-sm-12">
                    <h2 class=" fw-bold">Digital Patient ID Cards</h2>
                    <p class="text-body-tertiary fw-medium">Every patient gets a unique digital ID card
                        with QR code
                        verification, accessible via dashboard
                        or SMS for non-smartphone users.</p>


                    <ul class="">
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-check-lg text-success fw-bold" viewBox="0 0 16 16">
                                <path
                                    d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                            </svg>
                            Instant QR code verification
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-check-lg text-success fw-bold" viewBox="0 0 16 16">
                                <path
                                    d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                            </svg>
                            Works on smartphones and basic phones
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-check-lg text-success fw-bold" viewBox="0 0 16 16">
                                <path
                                    d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                            </svg>
                            Secure patient identification
                        </li>
                        <li class="list-group-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-check-lg text-success fw-bold" viewBox="0 0 16 16">
                                <path
                                    d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                            </svg>
                            Hospital integration ready
                        </li>

                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="patient-card card">
                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0 text-primary fw-semibold">
                                <i class="bi bi-shield-check me-1"></i> Digital Patient ID
                            </h6>
                            <span class="status-badge">Active</span>
                        </div>

                        <!-- Avatar & Info -->
                        <div class="d-flex align-items-center mb-2">
                            <div class="patient-avatar">JS</div>
                            <div class="ms-3">
                                <h6 class="mb-0 fw-bold">John Smith</h6>
                                <small class="text-muted">Age: 32</small><br>
                                <small class="text-muted"><i class="bi bi-geo-alt me-1"></i> St. Mary’s
                                    Hospital</small>
                            </div>
                        </div>

                        <hr>

                        <!-- Footer Info -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted d-block">
                                    <i class="bi bi-calendar me-1"></i> Issued: Jan 15, 2024
                                </small>
                                <small class="text-muted d-block">ID: #MED-2024-001234</small>
                            </div>
                            <div class="qr-placeholder">
                                <i class="bi bi-qr-code"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="bg-white p-5">
            <div class="row justify-content-center ">
                <div class="col-lg-6 col-sm-12">
                    <h2 class=" fw-bold text-center">Powerful Dashboards for Every Role</h2>
                    <p class="text-body-tertiary fw-medium text-center">Comprehensive analytics and management tools
                        tailored for
                        each user type</p>
                </div>

                <!-- Admin Dashboard -->
                <div class="dashboard-section">
                    <h5><i class="bi bi-shield-fill text-primary"></i> Admin Dashboard</h5>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="card p-3">
                                <h6>Pending Hospitals</h6>
                                <div class="value text-info">12</div>
                                <small class="text-muted">Awaiting approval</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3">
                                <h6>Approved Today</h6>
                                <div class="value text-success">8</div>
                                <small class="text-muted">+15% from yesterday</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3">
                                <h6>System Health</h6>
                                <div class="value text-success">99.9%</div>
                                <small class="text-muted">Uptime</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hospital Dashboard -->
                <div class="dashboard-section">
                    <h5><i class="bi bi-hospital-fill text-primary"></i> Hospital Dashboard</h5>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="card p-3">
                                <h6>Active Doctors</h6>
                                <div class="value text-info">24</div>
                                <small class="text-muted">+2 this week</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <h6>Today's Appointments</h6>
                                <div class="value text-info">156</div>
                                <small class="text-muted">89% attended</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <h6>Active Patients</h6>
                                <div class="value text-success">1,234</div>
                                <small class="text-muted">+45 this month</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <h6>Revenue</h6>
                                <div class="value text-success">$45.2K</div>
                                <small class="text-muted">+12% vs last month</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Patient Dashboard -->
                <div class="dashboard-section">
                    <h5><i class="bi bi-person-fill text-primary"></i> Patient Dashboard</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card p-3">
                                <div class="d-flex justify-content-between">
                                    <h6>Upcoming Appointments</h6>
                                    <span class="badge bg-secondary rounded-pill">3</span>
                                </div>
                                <div class="mt-3">
                                    <strong>Dr. Sarah Johnson</strong>
                                    <p class="mb-1 text-muted">Cardiology</p>
                                    <small class="text-muted">Tomorrow · 2:30 PM</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-3">
                                <div class="d-flex justify-content-between">
                                    <h6>Medical Records</h6>
                                    <button class="btn btn-outline-secondary btn-sm">Export</button>
                                </div>
                                <ul class="list-unstyled mt-3 mb-0">
                                    <li>Last Checkup <span class="text-muted float-end">Dec 15, 2023</span></li>
                                    <li>Blood Pressure <span class="badge bg-info status-badge float-end">Normal</span>
                                    </li>
                                    <li>Weight <span class="text-muted float-end">165 lbs</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="btn-gradient-primary p-5">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6 col-sm-12 text-center">
                    <h2 class=" fw-bold">Powerful Dashboards for Every Role</h2>
                    <p class="text-body-tertiary fw-medium">Join leading healthcare providers who trust Cardify Health
                        for secure, efficient patient and hospital management.</p>
                    <a class="btn btn-outline-light btn-sm " href="#Demo" role="button">Demo</a>
                    <a class="btn btn-outline-light btn-sm " href="#btn" role="button"> Schedule Demo</a>
                </div>
            </div>
        </section>


    </main>
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

    @if (session('info'))
        <div class="notify-container" id="notifyContainer">
        </div>
        <script>
            // showToast("{{ session('success') }}", "info")
            showNotify(
                "<i class='bi bi-door-open text-white'></i> <span class='text-white'>{{ session('info') }}<span>",
                'success', 5000)
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
