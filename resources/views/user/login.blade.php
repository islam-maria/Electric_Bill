<!-- user-login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="{{ asset('css/user_login.css') }}">
</head>
<body class="login-body">
    <div class="login-container">
        <a href="{{ route('index') }}" class="backbutton">Back</a>
        <h2>User Login</h2>

        <!-- Display errors -->
        @if ($errors->any())
    <div class="error-messages">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



        <!-- Login Form -->
        <form action="{{ route('user.login.submit') }}" method="POST">

    @csrf
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone_no">Phone Number:</label>
    <input type="text" id="phone_no" name="phone_no" required>

    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <button type="submit" class="submit-btn">Login</button>
</form>

    </div>
</body>
</html>
