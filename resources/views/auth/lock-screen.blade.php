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
                    <h4 class="fw-bold text-dark mb-2">Hi ! {{ user()->name }}</h3>
                        <p class="text-muted">Enter your password to access the dashboard.</p>
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
                <form method="POST" action="{{ route('lock_screen.unlock') }}" class="mt-4">
                    @csrf
                    <x-forms.input type="password" name="password" label="Password *" placeholder="Enter your password" />

                    <div class="mb-1 text-center d-grid">
                        <button class="btn btn-dark btn-lg fw-medium" type="submit">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
