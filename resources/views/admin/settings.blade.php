<x-admin :title="'Admin - Settings'">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <x-aside></x-aside>
            <div class="col py-4 mt-5">

                <div id="content-settings active" class=" ">
                    <!-- Main Content -->
                    <div class="row">
                        <!-- Side Navigation -->
                        <div class="col-md-3">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <nav class="nav nav-pills flex-column">
                                        <a href="#payment" class="nav-link active">Payment Methods</a>
                                        <a href="#general" class="nav-link">General Settings</a>
                                        <a href="#notifications" class="nav-link">Notifications</a>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="card mb-4">
                                <form method="POST" action="{{ route('admin.settings.change') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Admin Settings</h4>
                                    </div>

                                    <!-- Payment Method Section -->
                                    <div id="payment" class="card-body">
                                        <h5 class="mb-3">Payment Methods</h5>

                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <div class="form-check form-switch">
                                                    <input type="hidden" name="payment_method" value="off">
                                                    <input class="form-check-input" name="payment_method"
                                                        type="checkbox" id="autoRenewal"
                                                        {{ $payment_method == 'on' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="autoRenewal">
                                                        Enabled Telebirr
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="btn-group w-100" role="group">
                                                    <button type="button" class="btn btn-outline-primary w-100">
                                                        Telebirr
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary w-100">
                                                        CBE
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary w-100">
                                                        M-PESA
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- General Settings Section -->
                                    <div id="general" class="card-body border-top pt-4">
                                        <h5 class="mb-3">General Settings</h5>

                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <select class="form-select" id="timezone">
                                                        <option selected>UTC+0</option>
                                                        <option value="1">UTC+1</option>
                                                        <option value="2">UTC+2</option>
                                                    </select>
                                                    <label for="timezone">Timezone</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="emailUpdates"
                                                        checked>
                                                    <label class="form-check-label" for="emailUpdates">
                                                        Receive Email Updates
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary d-block w-25 mx-auto mt-4">
                                Save Changes
                            </button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
</x-admin>
