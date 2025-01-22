<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Electricity Billing System</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body class="dashboard-body">
    <div class="dashboard-container">
        <h1>Welcome to Admin Dashboard</h1>
        <div class="dashboard-buttons">
            <a href="{{ route('admin.bills') }}" class="btn">Bills Details</a>
          <a href="{{ route('admin.customer') }}" class="btn">User Details</a>
          
            <a href="{{ route('admin.user_add') }}" class="btn">Add New User</a>
            <a href="{{ route('admin.add_bill') }}" class="btn">Add new Bill</a>
            <a href="{{ route('logout') }}" class="logoutbtn">Log Out</a>
        </div>
    </div>
</body>
</html>
