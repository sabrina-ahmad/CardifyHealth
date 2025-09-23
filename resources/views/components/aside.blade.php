<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Menu</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link align-middle px-0" data-content="home">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.hospitals') }}" class="nav-link align-middle px-0" data-content="hospitals">
                    <i class="bi bi-hospital"></i>
                    <span class="ms-1 d-none d-sm-inline">Hospitals</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.waitlist') }}" class="nav-link align-middle px-0" data-content="waitlist">
                    <i class="fs-4 bi-clock"></i> <span class="ms-1 d-none d-sm-inline">Hospitals
                        Waitlist</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.doctors') }}" class="nav-link align-middle px-0" data-content="doctors">
                    <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline"> Doctors</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.departments') }}" class="nav-link align-middle px-0" data-content="doctors">
                    <i class="bi bi-building-add"></i> <span class="ms-1 d-none d-sm-inline"> Departments</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#Patients" class="nav-link align-middle px-0" data-content="patients">
                    <i class="fs-4 bi-person-fill"></i> <span class="ms-1 d-none d-sm-inline">
                        Patients Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#Medical" class="nav-link align-middle px-0" data-content="medical">
                    <i class="fs-4 bi-file-earmark-medical"></i> <span class="ms-1 d-none d-sm-inline">
                        Medical Records</span>
                </a>
            </li>

        </ul>
    </div>
</div>
