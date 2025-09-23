<x-admin :title="'Admin - Doctors'">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <x-aside></x-aside>
            <div class="col py-4 mt-5">
                <div id="content-hospitals active" class=" ">

                    <h2>All Doctors</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Specialty</th>
                                    <th>Department</th>
                                    <th>Hospital</th>
                                    <th>Hospital Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->address }}</td>
                                        <td>{{ $doctor->specialty }}</td>
                                        <td>{{ $doctor->hospital->hospital_name ?? 'sf' }}</td>
                                        <td>{{ $doctor->hospital->status ?? 'ss' }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.doctor.delete', $doctor->id) }}"
                                                style="display:inline;">
                                                @csrf
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Doctors waiting for approval.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin>
