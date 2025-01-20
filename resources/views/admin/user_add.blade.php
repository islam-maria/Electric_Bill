<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="{{ asset('css/bill.css') }}">
    
</head>

<body class="dashboard-body">
    <div class="dashboard-container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif

        <h1>User Details</h1>
        <a href="{{ route('admin.dashboard') }}" class="backbutton">Back</a>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone_no</th>
                    <th>Region</th>
                    <th>Option</th>
                   
                </tr>
            </thead>
           <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->address }}</td> <!-- Corrected from 'adress' to 'address' -->
            <td>{{ $user->phone_no }}</td>
            <td>{{ $user->region_id }}</td> <!-- Corrected from 'region_id' to 'region' -->
            <td>
            <a href="{{ route('admin.addCustomer', ['id' => $user->id]) }}" class="btn">Add</a>
            <a href="#" class="btn">Delete</a>
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
        <!-- <a href="{{ route('admin.dashboard') }}" class="btn">Back to Dashboard</a> -->
    </div>
</body>
</html>
                            
