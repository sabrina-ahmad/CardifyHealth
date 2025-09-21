<!-- resources/views/admin/departments/index.blade.php -->

<div class="card">
    <div class="card-header">
        <h3>Departments</h3>
        <a href="{{ route('admin.departments.create') }}" class="btn btn-primary float-end">Add New Department</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Doctors Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->description }}</td>
                        <td>{{ $department->doctors_count }}</td>
                        <td>
                            <!-- Add action buttons -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- resources/views/admin/doctors/create.blade.php -->

<div class="card">
    <div class="card-header">
        <h3>Add New Doctor</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.doctors.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name"
                    class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email"
                    class="form-control @error('email') is-invalid @enderror" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="department_id" class="form-label">Department</label>
                <select id="department_id" name="department_id"
                    class="form-select @error('department_id') is-invalid @enderror" required>
                    <option value="">Select Department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Doctor</button>
        </form>
    </div>
</div>
