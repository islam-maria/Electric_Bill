<!-- resources/views/admin/customers.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details - Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
</head>
<body class="dashboard-body">
    <div class="dashboard-container">
        <a href="{{ route('admin.dashboard') }}" class="backbutton">Back</a>
        <h1>Customer Details</h1>

<!-- Debugging: check what the $customers contains -->


<table>
    <thead>
        <tr>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Address</th>
            <th>Phone No</th>
            <th>Email</th>
            <th>Region ID</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->customer_id }}</td>
                <td>{{ $customer->customer_name }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->phone_no }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->region_id }}</td>
                <td>
                    <a href="#" class="btn">Edit</a>
                    <a href="#" class="btn">Copy</a>
                    <a href="#" class="btn">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
</body>
</html>
