@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 500px; margin-top: 80px;">
    <div class="card shadow-sm border-0 rounded">
        <div class="card-header text-center bg-primary text-white fs-4 fw-bold">
            Register to Stylemart
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- First Name -->
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input id="first_name" type="text"
                        class="form-control @error('first_name') is-invalid @enderror"
                        name="first_name" value="{{ old('first_name') }}" required autofocus>
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input id="last_name" type="text"
                        class="form-control @error('last_name') is-invalid @enderror"
                        name="last_name" value="{{ old('last_name') }}" required>
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input id="phone" type="text"
                        class="form-control @error('phone') is-invalid @enderror"
                        name="phone" value="{{ old('phone') }}" required>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                    <input id="password-confirm" type="password"
                        class="form-control" name="password_confirmation" required>
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Register
                    </button>
                </div>

                <!-- Already have account -->
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}">Already have an account? Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
