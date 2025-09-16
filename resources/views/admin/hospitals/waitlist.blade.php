@extends('admin.layout')

@section('content')
    <h2>Pending Hospital Approvals</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>License Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($hospitals as $hospital)
                <tr>
                    <td>{{ $hospital->hospital_name }}</td>
                    <td>{{ $hospital->email }}</td>
                    <td>{{ $hospital->address }}</td>
                    <td>{{ $hospital->license_number }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.hospitals.approve', $hospital->id) }}"
                            style="display:inline;">
                            @csrf
                            <button class="btn btn-success btn-sm">Approve</button>
                        </form>
                        <form method="POST" action="{{ route('admin.hospitals.reject', $hospital->id) }}"
                            style="display:inline;">
                            @csrf
                            <button class="btn btn-danger btn-sm">Reject</button>
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
@endsection
