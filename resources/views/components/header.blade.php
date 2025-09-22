@php
    $authUser = Auth::user();
@endphp
<header class="">
    <nav class="navbar fixed-top navbar-expand-sm glassy shadow">
        <div class="container-fluid">
            <div class="text-light btn-gradient-primary p-1 px-2 me-1  rounded-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor"
                    class="bi bi-activity" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2" />
                </svg>
            </div>
            @guest
                <a class="navbar-brand text-primary" href="/">Cardify Health</a>
            @else
                <div class="col">
                    <a class="navbar-brand text-primary m-0 p-0" href="{{ route('welcome') }}">Wellcome,
                        {{ $authUser->fullname }}</a>
                    @if ($authUser->role == 'patient')
                        <p class="m-0 p-0 text-success">Role: {{ $authUser->role }}</p>
                    @else
                    @endif
                </div>


            @endguest

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarID"
                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <div
                    class="w-100 d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center">
                    <div class="navbar-nav">
                        @guest
                            <a class="nav-link {{ request()->is('/') ? 'active fw-bold text-primary' : '' }}"
                                href="/">Home</a>
                            <a class="nav-link {{ request()->is('FAQs') ? 'active fw-bold text-primary' : '' }}"
                                href="/FAQs">FAQs</a>
                            <a class="nav-link {{ request()->is('#Demo') ? 'active fw-bold text-primary' : '' }}"
                                href="#Demo">Demo</a>
                            <a class="nav-link {{ request()->is('about') ? 'active fw-bold text-primary' : '' }}"
                                href="/about">About
                                Us</a>
                        @else
                            @php
                                if ($authUser instanceof \App\Models\User) {
                                    switch ($authUser->role) {
                                        case 'doctor':
                                            breake;
                                        case 'patient':
                                            $dashboardRoute = 'dashboard';
                                            $profileSettings = 'patient.profile.settings';
                                            break;
                                        default:
                                            $dashboardRoute = 'dashboard';
                                            $profileSettings = 'dashboard';
                                            break;
                                    }
                                } elseif ($authUser instanceof \App\Models\Hospital) {
                                    $dashboardRoute = 'hospital.dashboard';
                                } else {
                                    $dashboardRoute = 'dashboard';
                                }

                            @endphp

                        @endguest
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
                                            $profileSettings = 'patient.profile.settings';
                                            break;
                                        default:
                                            $dashboardRoute = 'dashboard';
                                            $profileSettings = 'dashboard';
                                            break;
                                    }
                                } elseif ($authUser instanceof \App\Models\Hospital) {
                                    $dashboardRoute = 'hospital.dashboard';
                                } else {
                                    $dashboardRoute = 'dashboard';
                                }
                            @endphp

                            @php
                                $names = explode(' ', trim($authUser->fullname));
                                $initials = strtoupper(substr($names[0], 0, 1));
                                if (isset($names[1])) {
                                    $initials .= strtoupper(substr($names[1], 0, 1));
                                }
                            @endphp

                            <div class="tooltips">
                                <a href="{{ route($profileSettings) }}"
                                    class=" align-items-sm-center justify-content-center rounded-circle">
                                    @if ($authUser->profile_image)
                                        <span class="bg-light border border-black rounded-circle text-align-center fw-bold"
                                            style="width: 30px; height: 30px; display: inline-block; overflow: hidden; line-height: 25px;">
                                            <img src="{{ asset('storage/' . $authUser->profile_image) }}"
                                                alt="Profile Image" class="img-fluid rounded-circle"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </span>
                                    @else
                                        <span
                                            class="p-2 bg-light border border-black rounded-circle text-align-center fw-bold"
                                            style=" line-height: 25px;">{{ $initials }}</span>
                                    @endif
                                    <!-- <i class="bi bi-person-square"></i> -->

                                </a>
                                <span class="tooltiptext border">profile </span>

                            </div>
                            <div class="tooltips">

                                <a href="{{ route($dashboardRoute) }}" class="btn btn-primary"><i
                                        class="bi bi-speedometer2"></i></a>
                                <span class="tooltiptext border">Dashboard</span>
                            </div>

                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf

                                <div class="tooltips">
                                    <button type="submit" class="btn btn-danger"><i
                                            class="bi bi-box-arrow-right"></i></button>
                                    <span class="tooltiptext border">Logout</span>
                                </div>
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
