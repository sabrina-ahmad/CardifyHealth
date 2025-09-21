@extends('departments.layout')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Department Details</h2>
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" href="{{ route('departments.index') }}">
                    <i class="fa-solid fa-arrow-left"></i> Back
                </a>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Department Name:</strong>
                        <p>{{ $department->name }}</p>
                    </div>

                    <div class="form-group">
                        <strong>Total Doctors:</strong>
                        <p>{{ $department->doctors->count() }} doctors</p>
                    </div>

                    <div class="form-group">
                        <strong>Doctors List:</strong>
                        <ul class="list-group">
                            @forelse($department->doctors as $doctor)
                                <li class="list-group-item">
                                    {{ $doctor->name }}
                                    @if ($doctor->appointments()->pending()->exists())
                                        <span class="badge bg-warning float-end">Has pending appointments</span>
                                    @endif
                                </li>
                            @empty
                                <li class="list-group-item">No doctors assigned</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
