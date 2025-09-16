<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    {{-- @vite(['resources/scss/app.scss', 'resources/js/app.js']) --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3" style="width: 250px; height: 100vh;">
            <h4>Admin</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a>
                </li>
                <li class="nav-item"><a href="{{ route('admin.hospitals.waitlist') }}"
                        class="nav-link text-white">Hospital
                        Waitlist</a></li>
            </ul>
        </div>

        <!-- Main -->
        <div class="p-4 w-100">
            @yield('content')
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script>
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 500); // Wait for fade transition
            }
        }, 5000); // 5 seconds
    </script>

</body>

</html>
