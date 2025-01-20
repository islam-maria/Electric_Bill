<!-- New index for project -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Billing System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="index-body">
        <!-- Top Navigation Bar -->
    <div class="top-nav">
        <a href="{{ route('admin.login') }}" class="btn login-btn">Admin Login</a>
        <a href="{{ route('user.register.form') }}" class="btn register-btn">User Register</a>
        <a href="{{ route('login') }}" class="btn login-btn">User Info</a>

    



    </div>

    <div class="index_div">
        <h1 class="index_head">Welcome To My Electricity Billing System Project</h1>
    </div>
</body>
</html>
