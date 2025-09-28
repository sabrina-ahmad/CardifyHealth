<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/doctor.css') }}">
</head>

<body class="">
    <nav class="sb-topnav navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="#">Doctor Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Empty for spacing -->
                </ul>
                <div class="d-none d-md-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn btn-link" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left left-2" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <div style="width: 50px;"></div>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-3 col-sm-2">

            <nav class="sidebar">
                <!-- Toggle button for mobile -->
                <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebar-content" aria-controls="sidebar-content" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="fas fa-bars"></span>
                </button>

                <div id="sidebar-content" class="collapse d-lg-block">
                    <div class="sidebar-header">
                        <a class="nav-link" href="#">
                            <i class="fas fa-stethoscope"></i>
                            <span>Doctor Dashboard</span>
                        </a>
                    </div>

                    <div class="nav flex-column">
                        <div class="sidebar-menu-heading">Core</div>
                        <a class="nav-link" href="#">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>

                        <div class="sidebar-menu-heading">Patients</div>
                        <a class="nav-link" href="#">
                            <i class="fas fa-user"></i>
                            <span>My Patients</span>
                        </a>
                        <a class="nav-link" href="#">
                            <i class="fas fa-calendar"></i>
                            <span>Appointments</span>
                        </a>

                        <div class="sidebar-menu-heading">Reports</div>
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-area"></i>
                            <span>Reports</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-10">

            <div id="layoutSidenav">
                <div id="layoutSidenav_content">
                    <main>
                        @yield('content')
                    </main>
                </div>

            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/doctor.js') }}"></script>
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
</body>

</html>
