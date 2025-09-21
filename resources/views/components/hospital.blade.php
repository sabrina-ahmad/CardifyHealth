@php
    $authUser = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cardify | {{ $title ?? 'Admin' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light glassy shadow">
        <div class="container-fluid">
            <div class="col">
                <a class="navbar-brand text-primary m-0 p-0" href="#">Wellcome, {{ $authUser->hospital_name }}</a>
                <p class="m-0 p-0 text-success">Role: Hospital Admin</p>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#register">Register Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#view-doctors">View Doctors</a>
                    </li>

                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf

                        <li class="tooltips">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i></button>
                            <span class="tooltiptext border">Logout</span>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        {{ $slot }}
    </main>

    <script src="{{ asset('js/toast.js') }}"></script>

    @if (session('success'))
        <div class="notify-container" id="notifyContainer">
        </div>
        <script>
            showToast("{{ session('success') }}", "info")
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

    <script>
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 500); // Wait for fade transition
            }
        }, 5000); // 5 seconds
        // document.addEventListener('DOMContentLoaded', function() {
        //     // Get all content sections
        //     const contentSections = document.querySelectorAll('.content-section');
        //
        //     // Function to show/hide content
        //     function showContent(contentId) {
        //         // Hide all content sections
        //         contentSections.forEach(section => {
        //             section.classList.remove('active');
        //         });
        //
        //         // Show selected content
        //         const targetSection = document.getElementById(`content-${contentId}`);
        //         if (targetSection) {
        //             targetSection.classList.add('active');
        //         }
        //     }
        //
        //     // Add event listeners to all sidebar links
        //     document.querySelectorAll('#menu .nav-link').forEach(link => {
        //         link.addEventListener('click', function(e) {
        //             // Prevent default link behavior
        //             e.preventDefault();
        //
        //             // Get content ID from data attribute
        //             const contentId = this.getAttribute('data-content');
        //
        //             // Show corresponding content
        //             if (contentId) {
        //                 showContent(contentId);
        //             }
        //         });
        //     });
        // });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script> --}}
</body>

</html>
