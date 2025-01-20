<?php

namespace App\Http\Controllers;

use App\Models\user; // Use the correct model
use App\Models\Customer;

use Illuminate\Http\Request;

class AdduserController extends Controller
{
    public function index()
    {
        // Fetch all users from the database using the Customer model
        $users = user::all();

        // Return the view with the fetched users
        return view('admin.user_add', compact('users'));
    }
    public function addCustomer($id)
    {
        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            // If the user is not found, redirect back with an error message
            return redirect()->route('admin.user_add')->with('error', 'User not found.');
        }

        // Check if the user is already in the customers table
        $existingCustomer = Customer::where('customer_id', $user->id)->first();
        if ($existingCustomer) {
            return redirect()->route('admin.user_add')->with('warning', 'This user is already a customer.');
        }

        // Store the user in the customers table
        Customer::create([
            'id' => $user->id,
            'customer_name' => $user->name,
            'email' => $user->email,
            'address' => $user->address,
            'phone_no' => $user->phone_no,
            'region_id' => $user->region_id, // Assuming region_id corresponds to region
        ]);
        $user->delete();
        // Redirect back with a success message
        return redirect()->route('admin.user_add')->with('success', 'User added to customers successfully.');
    }
}
