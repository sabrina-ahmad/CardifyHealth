<x-hospital>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <x-hside>
            </x-hside>
            <div class="container py-5 mt-5">
                <h1>Welcome, {{ $hospital->hospital_name ?? 'Hospital' }}</h1>
                <p>Status: <strong>{{ $hospital->status }}</strong></p>

                @if ($hospital->status === 'pending')
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-octagon-fill"></i>
                        Your account is pending approval by the admin.
                    </div>
                @elseif($hospital->status === 'approved' && $hospital->first_time === true)
                    <div class="alert alert-success d-flex gap-1 alert-dismissible fade show" role="alert">

                        <i class="bi bi-info-circle-fill"></i>
                        <div>
                            Your hospital is approved. You can now manage appointments and doctors!
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @php
                        $hospital->first_time = false;
                        $hospital->save();
                    @endphp
                @endif

            </div>
        </div>
    </div>
</x-hospital>
