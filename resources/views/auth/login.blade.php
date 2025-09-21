<x-layout>

    <div class="container-fluid mt-2 min-vh-100 d-flex">
        <div class="row w-100">

            <!-- LEFT: Hero Section -->
            <div
                class="col-lg-6 col-sm-12 col-md-6  d-lg-flex flex-column justify-content-center align-items-center text-white bg-primary p-5">
                <div class="text-center">
                    <h1 class="display-5 fw-bold">Welcome to Cardify Health</h1>
                    <p class="lead mt-3">
                        Find the right doctor, book appointments instantly, and manage your health better — all in one
                        place.
                    </p>
                    <img src="{{ asset('assets/images/healthcare-illustration.svg') }}" alt="Healthcare Illustration"
                        class="img-fluid mt-4" style="max-height: 300px;">
                </div>
            </div>

            <!-- RIGHT: Login Form -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center bg-white p-5">
                <div class="w-100" style="max-width: 400px;">

                    <h3 class="mb-4 text-center">Login to Cardify</h3>

                    {{-- 🔹 Change action based on which login you’re using --}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Login</button>

                        <!-- Forgot Password -->
                        <div class="mt-3 text-center">
                            {{-- <a href="{{ route('password.request') }}">Forgot your password?</a> --}}
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-layout>
