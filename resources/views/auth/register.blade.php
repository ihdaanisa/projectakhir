<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #715744;
        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-container {
            display: flex;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            flex: 1;
            padding: 2rem;
            background-color: #fff;
        }

        .info-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e0e0e0;
        }

        h2 {
            font-weight: bold;
            color: #715744;
        }

        label {
            color: #715744;
            font-size: 0.9rem;
            margin-top: 1rem;
        }

        input {
            border: 1px solid #715744;
            border-radius: 0.25rem;
        }

        .btn-primary {
            background-color: #715744;
            border: none;
        }

        .btn-primary:hover {
            background-color: #5d4a3a;
        }

        .text-muted {
            color: #6c757d;
        }

        .login-link {
            color: #715744;
            font-weight: bold;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="register-container">
        <!-- Form Section -->
        <div class="form-section">
            <h2>Create Account</h2>
            <p class="text-muted">Ready to Join? Let’s Get You Set Up!</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Naya Ruzqa" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" id="email" name="email" class="form-control" placeholder="nayaruzqa144@gmail.com" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" id="password" name="password" class="form-control" placeholder="********" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="********" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Sign Up</button>

                <div class="text-center mt-3">
                    <small class="text-muted">Already have an account? <a href="{{ route('login') }}" class="login-link">Sign In</a></small>
                </div>
            </form>
        </div>

        <!-- Info Section -->
        <div class="info-section">
            <p class="text-center fw-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
</body>
 </html>
