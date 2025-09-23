<x-admin :title="'Admin - Department'">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <x-aside></x-aside>
            <div class="col py-4 mt-5">
                <div id="content-hospitals active" class=" ">

                    <h2>All Department</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>No. Doctors</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($departments as $department)
                                    <tr>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->description }}</td>
                                        <td>{{ $department->doctors->count() }}</td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('admin.department.delete', $department->id) }}"
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
