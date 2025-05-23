@extends('auth.app')
@section('title', 'Forgot Password')
@section('content')
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-lg">
            <div class="card-body p-5">
                <div class="text-center">
                    <div class="mx-auto mb-4 text-center auth-logo">
                        <a href="index.html" class="logo-dark">
                            <img src="{{ getAppLogo('dark') }}" height="32" alt="logo dark">
                        </a>

                        <a href="index.html" class="logo-light">
                            <img src="{{ getAppLogo('light') }}" height="28" alt="logo light">
                        </a>
                    </div>
                    <h4 class="fw-bold text-dark mb-2">Reset Password</h3>
                        <p class="text-muted">Enter your email address and we'll send you an email
                            with instructions to reset your password.</p>
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
                @if (session('status'))
                    <div class="alert alert-success alert-icon" role="alert">
                        <div class="d-flex align-items-center">
                            <div
                                class="avatar-sm rounded bg-success d-flex justify-content-center align-items-center fs-18 me-2 flex-shrink-0">
                                <i class="bx bx-check-shield text-white"></i>
                            </div>
                            <div class="flex-grow-1">
                                {{ session('status') }}
                            </div>
                        </div>
                    </div>
                @endif
                {{-- :img="true" --}}
                <x-forms.form action="{{ route('password.email') }}">
                    <x-forms.input type="email" name="email" label="Email *" placeholder="Enter your email" required />
                    <div class="d-grid">
                        <button class="btn btn-dark btn-lg fw-medium" type="submit">Submit</button>
                    </div>
                </x-forms.form>
            </div>
        </div>
        <p class="text-center mt-4 text-white text-opacity-50">Back to
            <a href="{{ route('login') }}" class="text-decoration-none text-white fw-bold">Sign In</a>
        </p>
    </div>

    @push('scripts')
    @endpush
@endsection
