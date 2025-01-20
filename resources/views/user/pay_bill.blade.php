<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Bill</title>
    <link rel="stylesheet" href="{{ asset('css/bill.css') }}">
</head>
<body class="pay-bill-body">
<a href="{{ route('user.profile') }}" class="backbutton">Back</a>
    <div class="pay-bill-container">

        <h2 style="text-align:center">Your Unpaid Bills</h2>

        @if($bills->isEmpty())
            <p>You don't have any unpaid bills.</p>
        @else
            <!-- Display bills in a table -->
            <table>
                <tr>
                    <th>Bill ID</th>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                @foreach($bills as $bill)
<tr>
    <td>{{ $bill->bill_id }}</td>
    <td>{{ $bill->month }}</td>
    <td>{{ $bill->year }}</td>
    <td>{{ $bill->total_amount }}</td>
    <td>
        <!-- Updated: Pass the customer_id to the route -->
        <a href="{{ route('user.pay_bill', ['customerId' => $bill->customer_id]) }}" class="btn pay-bill-btn">Pay Now</a>
    </td>
</tr>
@endforeach

            </table>
        @endif
    </div>
</body>
</html>
