<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bills Details - Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/bill.css') }}">
    
</head>

<body class="dashboard-body">
    <div class="dashboard-container">
        <h1>Bills Details</h1>
        <a href="{{ route('admin.dashboard') }}" class="backbutton">Back</a>

        <table>
            <thead>
                <tr>
                    <th>Bill ID</th>
                    <th>Customer ID</th>
                    <th>Initial Reading</th>
                    <th>Final Reading</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Amount Per Unit</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bills as $bill)
                    <tr>
                        <td>{{ $bill->bill_id }}</td>
                        <td>{{ $bill->customer_id }}</td>
                        <td>{{ $bill->initial_reading }}</td>
                        <td>{{ $bill->final_reading }}</td>
                        <td>{{ $bill->month }}</td>
                        <td>{{ $bill->year }}</td>
                        <td>{{ $bill->amount_per_unit }}</td>
                        <td>{{ $bill->total_amount }}</td>
                        <td>{{ $bill->status }}</td>
                        <td>
                            <a href="#" class="btn">Edit</a>
                            <a href="#" class="btn">Copy</a>
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
                            
