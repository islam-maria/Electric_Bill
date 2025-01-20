<!DOCTYPE html>
<html class="login-html" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Electricity Billing System</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body class="login-body">
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="{{ route('admin.login.submit') }}">
     @csrf  <!-- CSRF Token -->
    <!-- Email Input -->
    <div class="input-container">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required>
    </div>
    <!-- Password Input -->
    <div class="input-container">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>
    <!-- Submit Button -->
    <div class="form-group">
        <button type="submit" class="btn2">Login</button>
    </div>
</form>

        </div>
    </div>
</body>
</html>
