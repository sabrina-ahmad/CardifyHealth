<x-admin>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <x-aside></x-aside>
            <div class="col py-4 mt-5">
                <div id="content-hospitals active" class=" ">

                    <h2>Pending Hospital Approvals</h2>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Contact Person</th>
                                    <th>License Number</th>
                                    <th>Actions</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($hospitals as $hospital)
                                    <tr>
                                        <td>{{ $hospital->hospital_name }}</td>
                                        <td>{{ $hospital->email }}</td>
                                        <td>{{ $hospital->address }}</td>
                                        <td>{{ $hospital->phone_number }}</td>
                                        <td>{{ $hospital->contact_person }}</td>
                                        <td>{{ $hospital->license_number }}</td>
                                        <td>{{ $hospital->status }}</td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('admin.hospitals.approve', $hospital->id) }}"
                                                style="display:inline;">
                                                @csrf
                                                <button class="btn btn-success btn-sm">approve</button>
                                            </form>
                                            <form method="POST"
                                                action="{{ route('admin.hospitals.reject', $hospital->id) }}"
                                                style="display:inline;">
                                                @csrf
                                                <button class="btn btn-danger btn-sm">reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No hospitals waiting for approval.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
</x-admin>
