<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ElectricityBill;
use App\Models\Customer;

class BillController extends Controller
{
    // Show the list of bills
    public function index()
    {
        $bills = ElectricityBill::with('customer')->get();
        return view('admin.bills', compact('bills'));
    }

    // Show the form to add a new bill
    public function createBillForm()
    {
        // Fetch customers from the database
        $customers = Customer::all(); // Fetch all customers
        return view('admin.add_bill', compact('customers'));
    }

    // Store the new bill in the database
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'initial_reading' => 'required|numeric',
            'final_reading' => 'required|numeric|gte:initial_reading',
            'month' => 'required|string',
            'year' => 'required|integer',
            'amount_per_unit' => 'required|numeric',
        ]);

        // Calculate the total amount
        $total_units = $request->final_reading - $request->initial_reading;
        $total_amount = $total_units * $request->amount_per_unit;

        // Create the bill
        ElectricityBill::create([
            'customer_id' => $request->customer_id,
            'initial_reading' => $request->initial_reading,
            'final_reading' => $request->final_reading,
            'month' => $request->month,
            'year' => $request->year,
            'amount_per_unit' => $request->amount_per_unit,
            'total_amount' => $total_amount,
            'status' => 'Unpaid', // Default status
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.bills')->with('success', 'Bill added successfully!');
    }
}
