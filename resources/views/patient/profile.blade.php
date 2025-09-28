<x-layout :title="'Profile'">

    <div class="container py-5">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            <div class="col-md-4 d-none d-md-block">
                <div class="card">
                    <div class="card-body">
                        <nav class="nav flex-column nav-pills nav-gap-y-1">
                            <a href="#profile" data-bs-toggle="tab" data-bs-target="#profile"
                                class="nav-item nav-link has-icon nav-link-faded active">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-user mr-2 mx-1">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>Profile Information
                            </a>
                            <a href="#account" data-bs-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-settings mr-2 mx-1">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                    </path>
                                </svg>Account Settings
                            </a>
                            <a href="#security" data-bs-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-shield mr-2 mx-1">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>
                                Security
                            </a>
                            <a href="#notification" data-bs-toggle="tab"
                                class="nav-item nav-link has-icon nav-link-faded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-bell mr-2 mx-1">
                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                </svg>Notification
                            </a>
                            <a href="#billing" data-bs-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-credit-card mr-2 mx-1">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2">
                                    </rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>Billing
                            </a>
                            <a href="#digitalCard" data-bs-toggle="tab"
                                class="nav-item nav-link has-icon nav-link-faded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" class="bi bi-person-vcard-fill mr-2 mx-1" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
                                </svg>Digitial Card
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-bottom mb-3 d-flex d-md-none">
                        <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                            <li class="nav-item">
                                <a href="#profile" data-bs-toggle="tab" class="nav-link has-icon active"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg></a>
                            </li>
                            <li class="nav-item">
                                <a href="#account" data-bs-toggle="tab" class="nav-link has-icon"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-settings">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path
                                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                        </path>
                                    </svg></a>
                            </li>
                            <li class="nav-item">
                                <a href="#security" data-bs-toggle="tab" class="nav-link has-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-shield">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#notification" data-bs-toggle="tab" class="nav-link has-icon"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg></a>
                            </li>
                            <li class="nav-item">
                                <a href="#billing" data-bs-toggle="tab" class="nav-link has-icon"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-credit-card">
                                        <rect x="1" y="4" width="22" height="16" rx="2"
                                            ry="2"></rect>
                                        <line x1="1" y1="10" x2="23" y2="10"></line>
                                    </svg></a>
                            </li>
                            <li class="nav-item">
                                <a href="#digitalCard" data-bs-toggle="tab" class="nav-link has-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-person-vcard-fill mr-2 mx-1"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body tab-content">
                        <div class="tab-pane active" id="profile">
                            <h6>YOUR PROFILE INFORMATION</h6>
                            <hr>
                            <form class="row gap-3" method="post" action="{{ route('patient.updateProfile') }}""
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" name="fullname" class="form-control"
                                                id="fullName" aria-describedby="fullNameHelp"
                                                placeholder="Enter your fullname" value="{{ $user->fullname }}">
                                            <!-- <small id="fullNameHelp" class="form-text text-muted">Your name may appear -->
                                            <!--     around -->
                                            <!--     here where you are mentioned. You can change or remove it at any -->
                                            <!--     time.</small> -->
                                        </div>
                                    </div>

                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="fullName"
                                                aria-describedby="fullNameHelp" placeholder="Enter your fullname"
                                                value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="phone_number" class="form-label">Phone Number</label>

                                            <div class="input-group">
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="">+251</span>
                                                    <input type="text" class="form-control " id="phone_number"
                                                        name="phone_number" value="{{ $user->phone_number }}"
                                                        placeholde="912345678" maxlength="9" required>
                                                    <div class="invalid-feedback">
                                                        Please check your phone number.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="dob" class="form-label">Date of Birth</label>
                                            <input type="date" name="dob" class="form-control" id="dob"
                                                value="{{ $user->dob }}" required="">
                                            <div class="invalid-feedback">
                                                Valid birth date is required.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                value="{{ $user->address }}" required="">
                                            <div class="invalid-feedback">
                                                Valid address is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-select" name="gender" aria-label="Default select example">
                                                <option {{ $user->gender == null || $user->gender == "" ? 'selected' : ''}} value="">Select Gender</option>
                                                <option {{ $user->gender == "M" ? 'selected' : ''}} value="M">Male</option>
                                                <option {{ $user->gender == "F" ? 'selected' : ''}} value="F">Female</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Valid birth date is required.
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">

                                            <label for="profile_image" class="form-label">Uploade Porfile
                                                Image</label>
                                            <input class="form-control" name="profile_image" type="file"
                                                id="profile_image">

                                            <div class="invalid-feedback">
                                                Valid birth date is required.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group small text-muted">
                                    All of the fields on this page are optional and can be deleted at any time, and by
                                    filling them out, you're giving us consent to share this data wherever your user
                                    profile appears.
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                    <button type="reset" class="btn btn-light">Reset Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="account">
                            <h6>ACCOUNT SETTINGS</h6>
                            <hr>
                            <form action="{{ route('patient.updateUsername') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username"
                                        aria-describedby="usernameHelp" placeholder="Enter your username"
                                        value="{{ $user->username }}">
                                    <small id="usernameHelp" class="form-text text-muted">After changing your
                                        username, your old username becomes available for anyone else to claim.</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Change</button>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="d-block text-danger">Delete Account</label>
                                    <p class="text-muted font-size-sm">Once you delete your account, there is no going
                                        back. Please be certain.</p>
                                </div>
                            </form>
                            <form action="{{ route('patient.delete') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete Account</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="security">
                            <h6>SECURITY SETTINGS</h6>
                            <hr>
                            <form>
                                <div class="form-group">
                                    <label class="d-block">Change Password</label>
                                    <input type="text" class="form-control" placeholder="Enter your old password">
                                    <input type="text" class="form-control mt-1" placeholder="New password">
                                    <input type="text" class="form-control mt-1"
                                        placeholder="Confirm new password">
                                </div>
                            </form>
                            <hr>
                            <form>
                                <div class="form-group">
                                    <label class="d-block">Two Factor Authentication</label>
                                    <button class="btn btn-info" type="button">Enable two-factor
                                        authentication</button>
                                    <p class="small text-muted mt-2">Two-factor authentication adds an additional layer
                                        of security to your account by requiring more than just a password to log in.
                                    </p>
                                </div>
                            </form>
                            <hr>
                            <form>
                                <div class="form-group mb-0">
                                    <label class="d-block">Sessions</label>
                                    <p class="font-size-sm text-secondary">This is a list of devices that have logged
                                        into your account. Revoke any sessions that you do not recognize.</p>
                                    <ul class="list-group list-group-sm">
                                        <li class="list-group-item has-icon">
                                            <div>
                                                <h6 class="mb-0">San Francisco City 190.24.335.55</h6>
                                                <small class="text-muted">Your current session seen in United
                                                    States</small>
                                            </div>
                                            <button class="btn btn-light btn-sm ml-auto" type="button">More
                                                info</button>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="notification">
                            <h6>NOTIFICATION SETTINGS</h6>
                            <hr>
                            <form>
                                <div class="form-group">
                                    <label class="d-block mb-0">Security Alerts</label>
                                    <div class="small text-muted mb-3">Receive security alert notifications via email
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1"
                                            checked="">
                                        <label class="custom-control-label" for="customCheck1">Email each time a
                                            vulnerability is found</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2"
                                            checked="">
                                        <label class="custom-control-label" for="customCheck2">Email a digest summary
                                            of vulnerability</label>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <label class="d-block">SMS Notifications</label>
                                    <ul class="list-group list-group-sm">
                                        <li class="list-group-item has-icon">
                                            Comments
                                            <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customSwitch1" checked="">
                                                <label class="custom-control-label" for="customSwitch1"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item has-icon">
                                            Updates From People
                                            <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customSwitch2">
                                                <label class="custom-control-label" for="customSwitch2"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item has-icon">
                                            Reminders
                                            <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customSwitch3" checked="">
                                                <label class="custom-control-label" for="customSwitch3"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item has-icon">
                                            Events
                                            <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customSwitch4" checked="">
                                                <label class="custom-control-label" for="customSwitch4"></label>
                                            </div>
                                        </li>
                                        <li class="list-group-item has-icon">
                                            Pages You Follow
                                            <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="customSwitch5">
                                                <label class="custom-control-label" for="customSwitch5"></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="digitalCard">
                            <div class="d-flex justify-content-between">

                                <h6>My Digital Id</h6>

                                <div class="d-flex gap-3">

                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Export to
                                        </button>
                                        <ul class="dropdown-menu">
                                            <a href="{{ route('patient.export.excel') }}"
                                                class="dropdown-item"">Excel</a>
                                            <li><a target="_blank" class="dropdown-item" href="{{ route('export.pdf') }}">PDF</a></li>
                                        </ul>
                                    </div>

                                    <div class="dropdown">
                                        <button class="btn btn-danger dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Download Card
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" onclick="downloadCard()"
                                                    href="#">PNG</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <hr>

                            <div class="row">

                                <div class="col mx-auto ">
                                    <div class="patient-card card" id="patient-card">
                                        @php
                                            $names = explode(' ', trim($user->fullname));
                                            $initials = strtoupper(substr($names[0], 0, 1));
                                            if (isset($names[1])) {
                                                $initials .= strtoupper(substr($names[1], 0, 1));
                                            }
                                        @endphp
                                        <!-- Header -->
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="mb-0 text-primary fw-semibold">
                                                <i class="bi bi-shield-check me-1"></i> Digital Patient ID
                                            </h6>
                                            <span class="status-badge">Active</span>
                                        </div>

                                        <!-- Avatar & Info -->
                                        <div class="d-flex align-items-center mb-2">

                                            @if ($user->profile_image)
                                                <div class="rounded-circle"
                                                    style="width: 75px; height: 75px; overflow: hidden;">
                                                    <img src="{{ asset('storage/' . $user->profile_image) }}"
                                                        alt="Profile Image" class="img-fluid rounded-circle"
                                                        style="width: 100%; height: 100%; object-fit: cover;">
                                                </div>
                                            @else
                                                <div class="patient-avatar">{{ $initials }}</div>
                                            @endif
                                            <div class="ms-3">
                                                @php
                                                    $dateOfBirth = $user->dob;
                                                    $age = \Carbon\Carbon::parse($dateOfBirth)->age;
                                                @endphp
                                                <h6 class="mb-0 fw-bold">{{ $user->fullname }}</h6>
                                                <small class="text-muted">Age: {{ $age }}</small><br>
                                                <!-- <small class="text-muted"><i class="bi bi-geo-alt me-1"></i> St. -->
                                                <!--     Mary’s -->
                                                <!--     Hospital</small> -->
                                            </div>
                                        </div>

                                        <hr>

                                        <!-- Footer Info -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <small class="text-muted d-block">
                                                    <i class="bi bi-calendar me-1"></i> Issued:
                                                    {{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}
                                                </small>
                                                <small class="text-muted d-block">ID:
                                                    #MED-{{ \Carbon\Carbon::parse($user->created_at)->format('Y') }}-{{ substr($user->id, 0, 7) }}</small>
                                            </div>
                                            <div class="qr-placeholder">
                                                <i class="bi bi-qr-code"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="billing">
                            <h6>BILLING SETTINGS</h6>
                            <hr>
                            <form>
                                <div class="form-group">
                                    <label class="d-block mb-0">Payment Method</label>
                                    <div class="small text-muted mb-3">You have not added a payment method</div>
                                    <button class="btn btn-info" type="button">Add Payment Method</button>
                                </div>
                                <div class="form-group mb-0">
                                    <label class="d-block">Payment History</label>
                                    <div class="border border-gray-500 bg-gray-200 p-3 text-center font-size-sm">You
                                        have not made any payment.</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function downloadCard() {
            const card = document.getElementById('patient-card');

            html2canvas(card).then(canvas => {
                const link = document.createElement('a');
                link.download = 'patient-card.png';
                link.href = canvas.toDataURL();
                link.click();
            });
        }
    </script>

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


    <script src="{{ asset('js/default.js') }}"></script>
</x-layout>
