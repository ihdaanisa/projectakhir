<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .profile-container {
            margin-top: 80px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            cursor: pointer;
        }
        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-white border-bottom fixed-top">
    <div class="d-flex">
        <a class="navbar-brand" href="#">Dashboard</a>
        <a class="navbar-brand ml-2" href="#">Templates</a>
    </div>
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
    </div>
</nav>

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

    <!-- Profile Edit Form -->
    <div class="profile-container">
        <div class="form-container">
            <h3 class="text-center mb-4">Edit Profile</h3>

            <!-- Success Notification -->
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Profile Picture -->
                <div class="form-group text-center">
                    <label for="profile_picture">
                        <img src="{{ auth()->user()->profile_picture ? asset('storage/profile/' . auth()->user()->profile_picture) : asset('img/placeholder.png') }}"
                             alt="Profile Picture"
                             class="profile-picture"
                             id="profilePicturePreview">
                        <input type="file" id="profile_picture" name="profile_picture" class="d-none" accept="image/*">
                    </label>
                </div>

                <!-- First and Last Name -->
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

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                </div>

                <!-- Phone Number -->
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', auth()->user()->address) }}</textarea>
                </div>

                <!-- Gender -->
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="male" {{ old('gender', auth()->user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', auth()->user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender', auth()->user()->gender) == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Profile Picture Preview
        document.getElementById('profile_picture').addEventListener('change', function(e) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('profilePicturePreview').src = event.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
</body>
</html>
