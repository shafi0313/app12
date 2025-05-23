@extends('auth.app')
@section('title', 'Login')
@section('content')
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-lg">
            <div class="card-body p-5">
                <div class="text-center">
                    <div class="mx-auto mb-4 text-center auth-logo">
                        <a href="#" class="logo-dark">
                            <img src="{{ getAppLogo('dark') }}" height="32" alt="logo dark">
                        </a>

                        <a href="#" class="logo-light">
                            <img src="{{ getAppLogo('light') }}" height="28" alt="logo light">
                        </a>
                    </div>
                    <h4 class="fw-bold text-dark mb-2">Welcome Back!</h3>
                        <p class="text-muted">Sign in to your account to continue</p>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- :img="true" --}}
                <x-forms.form action="{{ route('login') }}">
                    <x-forms.input type="text" name="email_or_phone" label="email or phone *" placeholder="Enter your email or phone" required />
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-decoration-none small text-muted">Forgot password?</a>
                            @endif

                        </div>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter your password" required>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember-me">
                        <label class="form-check-label" for="remember-me">Remember me</label>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-dark btn-lg fw-medium" type="submit">Sign In</button>
                    </div>
                </x-forms.form>
            </div>
        </div>
        <p class="text-center mt-4 text-white text-opacity-50">Don't have an account?
            <a href="auth-signup.html" class="text-decoration-none text-white fw-bold">Sign Up</a>
        </p>
    </div>

    @push('scripts')
    @endpush
@endsection
