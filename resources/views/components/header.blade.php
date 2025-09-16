<header class="">
    <nav class="navbar fixed-top navbar-expand-sm glassy shadow">
        <div class="container p-2">
            <div class=" text-light btn-gradient-primary p-1 px-2 me-1  rounded-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor"
                    class="bi bi-activity" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2" />
                </svg>
            </div>
            <a class="navbar-brand text-primary" href="/">Cardify Health Logo</a>
            {{-- <a class="navbar-brand fw-bold" href="/">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Cardify Health" height="40">
            </a> --}}

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarID"
                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <div
                    class="w-100 d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center">
                    <div class="navbar-nav">
                        <a class="nav-link {{ request()->is('/') ? 'active fw-bold text-primary' : '' }}"
                            href="/">Home</a>
                        <a class="nav-link {{ request()->is('service') ? 'active fw-bold text-primary' : '' }}"
                            href="/service">Service</a>
                        <a class="nav-link {{ request()->is('contact') ? 'active fw-bold text-primary' : '' }}"
                            href="/contact">Contact Us</a>
                        <a class="nav-link {{ request()->is('about') ? 'active fw-bold text-primary' : '' }}"
                            href="/about">About
                            Us</a>


                    </div>
                    <div class="navbar-nav gap-1 mt-2 mt-sm-0">
                        @guest
                            <a href="{{ route('register') }}" class="btn gradient-success">Register</a>
                            <a href="{{ route('login') }}" class="btn btn-gradient-primary text-white">Login</a>
                        @else
                            @php
                                $authUser = Auth::user();

                                if ($authUser instanceof \App\Models\User) {
                                    switch ($authUser->role) {
                                        case 'admin':
                                            $dashboardRoute = 'admin.dashboard';
                                            break;
                                        case 'doctor':
                                        case 'patient':
                                            $dashboardRoute = 'dashboard';
                                            break;
                                        default:
                                            $dashboardRoute = 'dashboard';
                                            break;
                                    }
                                } elseif ($authUser instanceof \App\Models\Hospital) {
                                    $dashboardRoute = 'hospital.dashboard';
                                } else {
                                    $dashboardRoute = 'dashboard';
                                }
                            @endphp

                            <a href="{{ route($dashboardRoute) }}" class="btn btn-primary">Dashboard</a>

                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        @endguest
                    </div>

                    {{-- <div class="navbar-nav gap-1 mt-2 mt-sm-0">
                        @guest
                            <a href="{{ route('register') }}" class="btn gradient-success">Register</a>
                            <a href="{{ route('login') }}" class="btn btn-gradient-primary text-white">Login</a>
                        @else
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-light">Dashboard</a>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        @endguest

                    </div> --}}
                </div>
            </div>

        </div>
    </nav>
</header>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light-blue">
                <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action>
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" placeholder="username">
                        <label for="username" class="form-label">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
