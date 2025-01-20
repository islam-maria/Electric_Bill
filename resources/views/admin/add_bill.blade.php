<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Bill</title>
    <link rel="stylesheet" href="{{ asset('css/add_bill.css') }}">
</head>
<body class="dashboard-body">
    <div class="dashboard-container">
    <a href="{{ route('admin.dashboard') }}" class="backbutton">Back</a>
        <h1>Add New Bill</h1>
        <form action="{{ route('admin.store_bill') }}" method="POST">
            @csrf
            <!-- Customer Dropdown -->
            <label for="customer_id">Select Customer:</label>
            <select name="customer_id" id="customer_id" required>
    <option value="">-- Select Customer --</option>
    @foreach($customers as $customer)
        <option value="{{ $customer->customer_id }}">{{ $customer->customer_id }}</option>
    @endforeach
</select>


            <!-- Initial Reading -->
            <label for="initial_reading">Initial Reading:</label>
            <input type="number" name="initial_reading" id="initial_reading" required>

            <!-- Final Reading -->
            <label for="final_reading">Final Reading:</label>
            <input type="number" name="final_reading" id="final_reading" required>

            <!-- Month Dropdown -->
            <label for="month">Month:</label>
            <select name="month" id="month" required>
                <option value="">-- Select Month --</option>
                @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                    <option value="{{ $month }}">{{ $month }}</option>
                @endforeach
            </select>

            <!-- Year Dropdown -->
            <label for="year">Year:</label>
            <select name="year" id="year" required>
                <option value="">-- Select Year --</option>
                @for($year = 2001; $year <= 2030; $year++)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>

            <!-- Amount Per Unit -->
            <label for="amount_per_unit">Amount Per Unit:</label>
            <input type="number" name="amount_per_unit" id="amount_per_unit" required>

            <button type="submit" class="btn">Add Bill</button>
        </form>
    </div>
</body>
</html>
