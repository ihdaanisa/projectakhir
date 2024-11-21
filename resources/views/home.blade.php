<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-light">

<!-- Top Navbar -->
<nav class="navbar navbar-light bg-white border-bottom fixed-top">
    <a class="navbar-brand ml-3" href="#">Dashboard</a>
    <div class="dropdown">
        <img src="{{ auth()->user()->profile_picture ? asset('storage/profile/' . auth()->user()->profile_picture) : 'https://via.placeholder.com/40' }}" 
             class="rounded-circle dropdown-toggle" id="profileDropdown" alt="Profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 40px; height: 40px;">
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
    <a class="dropdown-item" href="/user/edit">Account Settings</a>
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
        Sign Out
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
</nav>

<!-- Sidebar -->
<div class="d-flex">
    <div class="bg-white border-right position-fixed h-100" style="width: 220px; top: 56px; left: 0;">
        <div class="list-group list-group-flush mt-3">
            <a href="#" class="list-group-item list-group-item-action">All Sites</a>
            <a href="#" class="list-group-item list-group-item-action">Templates</a>
            <a href="#" class="list-group-item list-group-item-action">Editor</a>
            <a href="#" class="list-group-item list-group-item-action">Setting & Integrations</a>
            <a href="#" class="list-group-item list-group-item-action">Help & Support</a>
        </div>
    </div>

    <!-- Content -->
    <div class="container-fluid" style="margin-left: 220px; padding-top: 80px;">
        <h2>Account Settings</h2>

        <!-- Notification -->
        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif

        <div class="card mt-4 mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <div class="text-center mb-4">
                    <div class="mx-auto position-relative" style="width: 100px; height: 100px; overflow: hidden; border-radius: 50%;">
                        <img src="{{ auth()->user()->profile_picture ? asset('storage/profile/' . auth()->user()->profile_picture) : 'https://via.placeholder.com/100' }}" 
                             alt="Profile Picture" class="img-fluid">
                        <label for="profile_picture" class="btn btn-sm btn-primary position-absolute" style="bottom: 5px; right: 5px;">
                            <i class="fas fa-camera"></i>
                        </label>
                        <input type="file" id="profile_picture" name="profile_picture" class="d-none">
                    </div>
                </div>
                <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


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
