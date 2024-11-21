<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Aspirasi Pengaduan Online Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<header class="bg-light shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid" style="height: 40px;">
            </a>
            <!-- Navbar toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Centered Links -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="#">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark fw-medium" href="#">Dashboard</a>
                    </li>
                </ul>
                <!-- Right Side Icons -->
                <div class="d-flex align-items-center">
                    <!-- Language Dropdown -->
                    <div class="dropdown me-3">
                        <a id="languageDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="text-decoration-none fs-5">
                            🌐
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Bahasa Indonesia</a></li>
                            <li><a class="dropdown-item" href="#">Español</a></li>
                        </ul>
                    </div>
                    <!-- Login Button -->
                    <a href="{{ route('login') }}" class="btn btn-outline-dark">Log In</a>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="text-center py-5 bg-light">
    <div class="container">
        <h1 class="display-4 fw-bold">Create Professional Landing Pages in Minutes</h1>
        <p class="lead text-muted">No coding skills required. Build high-converting pages for your business effortlessly.</p>
        <a href="#" class="btn btn-primary btn-lg">Get Started</a>
    </div>
</section>

<!-- Info Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <img src="path/to/image1.jpg" alt="Years of Service" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">2+ Years of Dedicated Service</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <img src="path/to/image2.jpg" alt="Custom Templates" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">100+ Customizable Templates</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <img src="path/to/image3.jpg" alt="Innovative Solutions" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">Innovative Solutions</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section with Text on the Left and Image on the Right -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold">Create Your First Page With Our Smart Builder</h2>
                <p class="text-muted">Experience a seamless process to create a landing page that perfectly reflects your brand's identity and style.</p>
                <a href="#" class="btn btn-primary">Get Started</a>
            </div>
            <div class="col-md-6 text-center">
            <img src="{{ asset('images/create.png') }}" alt="Facebook Icon">
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>