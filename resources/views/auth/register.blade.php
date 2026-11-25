<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ __('Register') }} - {{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="text-center mb-4">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" width="100" alt="Logo" />
        </a>
    </div>
    <div class="bg-white rounded shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <h1 class="text-center fw-bold mb-4">{{ __('Register') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger small">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    placeholder="Your Name"
                    class="form-control"
                />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    placeholder="joe@email.com"
                    class="form-control"
                />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    placeholder="Enter your Password"
                    class="form-control"
                />
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    placeholder="Confirm your Password"
                    class="form-control"
                />
            </div>

<button type="submit" class="btn btn-primary w-100 fw-semibold">
                {{ __('Register') }}
            </button>

            <p class="mt-3 text-center small text-muted">
                {{ __('Already have an account?') }}
                <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">
                    {{ __('Log in') }}
                </a>
            </p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
