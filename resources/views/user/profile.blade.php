<!-- user-profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/bill.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .profile-container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #4CAF50;
            font-weight: bold;
        }
        .pay-bill-btn{
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
            margin-top: 10px;
        }
        .pay-bill-btn:hover {
            background-color: #45a049;
        }
        .logout-btn {
    padding: 10px 20px;
    background-color: #f44336; /* Red color for logout */
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    text-align: center;
    margin-top: 10px;
}

.logout-btn:hover {
    background-color: #e53935; /* Darker red on hover */
}

    </style>
</head>
<body class="profile-body">
    <div class="profile-container">
        <h2>User Profile</h2>
        
        <!-- Display customer data in a table -->
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Region</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>{{ $customer->customer_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone_no }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->region_id }}</td>
                <td>
                <a href="{{ route('user.pay_bill', ['customerId' => $customer->customer_id]) }}" class="btn pay-bill-btn">Pay Bill</a>

                </td>
            </tr>
        </table>

        <!-- Logout Link -->
     
        <a href="{{ route('logout') }}" class="btn logout-btn">Logout</a>

    </div>
</body>
</html>
