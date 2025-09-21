<div class="card">
    <div class="card-header">
        <h3>Departments</h3>
        <a href="{{ route('admin.departments.create') }}" class="btn btn-primary float-end">Add New Department</a>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" placeholder="Search departments..." value="{{ request()->search }}"
                    class="form-control">
                <button type="submit" class="btn btn-outline-secondary">Search</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Doctors Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($departments as $department)
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->description ?? '-' }}</td>
                        <td>{{ $department->doctors_count }}</td>
                        <td>
                            <a href="{{ route('admin.departments.edit', $department) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.departments.destroy', $department) }}" method="POST"
                                style="display: inline-block;" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No departments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
