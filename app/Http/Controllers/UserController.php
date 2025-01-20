<?php

namespace App\Http\Controllers;

use App\Models\AuthCustomer;
use App\Models\Customer;
use App\Models\ElectricityBill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\AuthenticationException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['showCustomers', 'registerForm', 'register', 'loginForm', 'login']);
    }

    public function showCustomers()
    {
        $customers = Customer::all();
        return view('admin.customer', compact('customers'));
    }

    public function register(Request $request)
    {
        Log::info('Registration Data:', $request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|string|max:255',
            'phone_no' => 'required|string|max:15',
            'region_id' => 'required|string|max:50',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'region_id' => $request->region_id,
            'password' => Hash::make($request->password),
        ]);

        Log::info('User created:', ['user' => $user]);

        return redirect()->route('user.register.form')->with('success', 'Registration successful.');
    }
    public function registerForm()
    {
        return view('user.register');  // Make sure you have 'resources/views/user/register.blade.php'
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'phone_no' => 'required|string|max:15',
        ]);

        $customer = Customer::where('email', $request->email)
                            ->where('phone_no', $request->phone_no)
                            ->first();

        if (!$customer) {
            return redirect()->route('user.login.form')->withErrors(['message' => 'Invalid credentials.']);
        }

        Auth::login($customer);

        return redirect()->route('user.profile');
    }

    public function profile()
    {
        $customer = Auth::user();
    return view('user.profile', compact('customer'));
        return view('user.profile');
    }

    public function payBill()
    {

        $customer = Auth::user();

        
        if ($customer === null) {
            
            return redirect()->route('user.login.form')->with('error', 'You must be logged in to view your bills.');
        }

     
        $bills = ElectricityBill::where('customer_id', $customer->customer_id)
                                 ->where('status', 'Unpaid') 
                                 ->get();

        
        return view('user.pay_bill', compact('bills'));
    }
    
   
}