<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS untuk menyesuaikan ukuran gambar profil dan membuatnya berbentuk lingkaran */
        .profile-img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            cursor: pointer;
            border-radius: 50%; /* Membuat gambar profil menjadi lingkaran */
        }

  /* Top Navbar Styling */
  .navbar {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1030;
        }

        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">

<!-- Top Navbar -->
<nav class="navbar navbar-light">
    <a class="navbar-brand ml-3" href="#">Dashboard</a>
    <div class="ml-auto mr-3">
        <div class="dropdown">
            <img src="{{ auth()->user()->profile_picture ? asset('storage/profile/' . auth()->user()->profile_picture) : 'https://via.placeholder.com/40' }}" 
                 class="profile-img" 
                 alt="Profile" 
                 data-toggle="dropdown">
            <div class="dropdown-menu dropdown-menu-right shadow">
                <a class="dropdown-item" href="#">Account Settings</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Sign Out</a>
            </div>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<div class="d-flex">
    <div class="bg-white shadow-sm" style="width: 240px; height: 100vh; position: fixed; top: 56px;">
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="#" class="list-group-item list-group-item-action">Templates</a>
            <a href="#" class="list-group-item list-group-item-action">All Sites</a>
            <a href="#" class="list-group-item list-group-item-action">Editor</a>
            <a href="#" class="list-group-item list-group-item-action">Setting & Integrations</a>
            <a href="#" class="list-group-item list-group-item-action">Help & Support</a>
        </div>
    </div>

    <!-- Content -->
    <div class="content flex-fill" style="margin-left: 240px; padding: 80px 20px;">
        <h2 class="mb-4">Account Settings</h2>
        
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <!-- Form -->
                <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Profile Picture -->
                    <div class="form-group text-center">
                        <label for="profile_picture">
                            <img src="{{ auth()->user()->profile_picture ? asset('storage/profile/' . auth()->user()->profile_picture) : 'https://via.placeholder.com/100' }}" 
                                 class="profile-img mb-3" 
                                 alt="Profile Picture">
                            <input type="file" id="profile_picture" name="profile_picture" style="display: none;">
                        </label>
                    </div>

                    <!-- Fields -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', auth()->user()->address) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="male" {{ old('gender', auth()->user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', auth()->user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender', auth()->user()->gender) == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelector('label[for="profile_picture"]').addEventListener('click', function() {
        document.getElementById('profile_picture').click();
    });
</script>
</body>
</html>
