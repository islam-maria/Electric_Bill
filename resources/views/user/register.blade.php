<!-- user-registration.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body class="register-body">
    <div class="register-container">
    <a href="{{ route('index') }}" class="backbutton">Back</a>
        <h2 class="register-header">User Registration</h2>
        <!-- Success Message -->
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('user.register') }}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>


            <label for="phone_no">Phone Number:</label>
            <input type="text" id="phone_no" name="phone_no" required>

            <label for="region_id">Region:</label>
            <input type="text" id="region_id" name="region_id" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="submit-btn">Register</button>
        </form>
    </div>
</body>
</html>
