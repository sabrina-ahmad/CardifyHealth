@php
    $authUser = Auth::user();
@endphp
<x-hospital>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <x-hside>
            </x-hside>
            <div class="py-5 card mx-auto mt-5 col-8 col-sm-8 col-md-9 col-lg-10">
                <h2 class="card-header">Departments Management</h2>
                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-success" href="{{ route('departments.create') }}">
                            <i class="fa-solid fa-plus"></i> Create New Department
                        </a>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped mt-4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Doctors</th>
                                    <th width="250px">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($departments as $department)
                                    @if ($department->hospital_id === $authUser->id)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $department->name }}</td>
                                            <td>{{ $department->description }}</td>
                                            <td>
                                                @if ($department->doctors->count())
                                                    {{ $department->doctors->count() }} doctors
                                                @else
                                                    No doctors assigned
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('departments.destroy', $department->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-info"
                                                        href="{{ route('departments.show', $department->id) }}">
                                                        <i class="fa-solid fa-list"></i> Show
                                                    </a>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('departments.edit', $department->id) }}">
                                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="4">No departments found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-hospital>
