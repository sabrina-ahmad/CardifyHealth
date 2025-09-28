@php
    $authUser = Auth::user();
@endphp
<x-hospital>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <x-hside>
            </x-hside>
            <div class="py-5 card mx-auto mt-5 col-8 col-sm-8 col-md-9 col-lg-10">
                <h2 class="card-header">Create New Department</h2>
                <div class="card-body">

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-primary" href="{{ route('departments.index') }}">
                            <i class="fa-solid fa-arrow-left"></i> Back
                        </a>
                    </div>

                    <form action="{{ route('departments.store') }}" method="POST">
                        @csrf

                        <input class="d-none" name="hospital_id" value="{{ $authUser->id }}" type="text">
                        <div class="mb-3">
                            <label for="inputName" class="form-label"><strong>Name:</strong></label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="inputName"
                                placeholder="Department Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label"><strong>Description:</strong></label>
                            <textarea name="description"class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-floppy-disk"></i> Create Department
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</x-hospital>
