<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            min-height: 100vh;
        }
        .login-left {
            background-color: #fff;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        .login-left h2 {
            font-size: 2rem;
            color: #715744;
            font-weight: 700;
        }
        .login-left p {
            color: #6c757d;
            margin-bottom: 30px;
        }
        .form-label {
            font-weight: 500;
            color: #715744;
        }
        .btn-primary {
            background-color: #c0a18a;
            border-color: #c0a18a;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #a58971;
            border-color: #a58971;
        }
        .input-group-text {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
        }
        .login-divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #6c757d;
        }
        .login-divider::before,
        .login-divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #ddd;
        }
        .login-divider:not(:empty)::before {
            margin-right: .5em;
        }
        .login-divider:not(:empty)::after {
            margin-left: .5em;
        }
        .login-right {
            background-color: #e5e5e5;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .login-right p {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
<div class="container-fluid login-container d-flex">
    <div class="row w-100">
        <div class="col-lg-6 login-left">
            <h2>Welcome Back!</h2>
            <p>Welcome Back! Glad to See You Again!</p>
            
            <form method="POST" action="{{ route('login') }}" class="w-75 mx-auto">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                        <span class="input-group-text"><i class="bi bi-eye-slash"></i></span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password?</a>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary w-100">Sign In</button>

                <div class="login-divider my-3">or login with</div>

                <div class="d-flex justify-content-center gap-3">
                    <a href="auth/google" class="btn btn-outline-secondary"><i class="bi bi-google"></i> Google</a>
                    <a href="#" class="btn btn-outline-secondary"><i class="bi bi-facebook"></i> Facebook</a>
                </div>

                <div class="text-center mt-4">
                    <span>Don’t have an account? <a href="{{ route('register') }}" class="fw-bold text-decoration-none">Sign Up</a></span>
                </div>
            </form>
        </div>

        <!-- Side content on the right -->
        <div class="col-lg-6 d-none d-lg-flex login-right">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 