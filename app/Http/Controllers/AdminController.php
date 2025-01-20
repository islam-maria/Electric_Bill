<?php

namespace App\Http\Controllers;

use App\Models\Customer;  // Add this line to use the Customer model
use Illuminate\Http\Request;
// use App\Models\Bill;

class AdminController extends Controller
{
   public function login(Request $request)
{
    // Validate login credentials
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // For simplicity, assuming a static login check (replace with actual authentication logic)
    if ($validated['email'] === 'admin@mail.com' && $validated['password'] === 'admin123') {
        return redirect()->route('admin.dashboard'); // Redirect to Admin Dashboard
    }

    // Redirect back with an error message if login fails
    return redirect()->back()->withErrors(['Invalid email or password']);
}
// In app/Http/Controllers/AdminController.php
public function dashboard()
{
    // Return the view for the admin dashboard
    return view('admin.dashboard');  // Adjust the view path if necessary
}
// app/Http/Controllers/AdminController.php


    public function showCustomers()
    {
        // Fetch all customer data from the customers table
        $customers = Customer::all();

        // Return the view with the customer data
        return view('admin.customers', compact('customers'));
    }
    

}




