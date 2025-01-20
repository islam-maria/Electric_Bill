<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdduserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login')->middleware('guest');

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/bills', [BillController::class, 'index'])->name('admin.bills');
// Protecting the route to show customers by 'auth' middleware
    // Route::get('/admin/customers', [UserController::class, 'showCustomers'])->middleware('auth')->name('admin.customer');
    Route::get('/admin/customers', [UserController::class, 'showCustomers'])->name('admin.customer');





// Route for showing users table when Add New User is clicked
Route::get('/admin/user_add', [AdduserController::class, 'index'])->name('admin.user_add');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Route for creating new bills
// Route to show the add bill form
Route::get('/admin/add-bill', [BillController::class, 'createBillForm'])->name('admin.add_bill');

// Route to store the bill data
Route::post('/admin/add-bill', [BillController::class, 'store'])->name('admin.store_bill');


// Define the route for showing the user registration form
Route::get('/user/register', [UserController::class, 'registerForm'])->name('user.register.form');

// Define the route for handling the form submission for user registration
Route::post('/user/register', [UserController::class, 'register'])->name('user.register');



// Route to add a user to the customers table
Route::get('/admin/add-customer/{id}', [AdduserController::class, 'addCustomer'])->name('admin.addCustomer');


// Route::get('/user/login-page', [UserController::class, 'showLoginForm'])->name('user.login.page');

// // Route to show the login form (user-login.blade.php)
Route::get('/login', function () {
    return view('user.login'); // user-login.blade.php
})->name('login');


Route::post('/login', [UserController::class, 'login'])->name('user.login.submit')
->middleware('web');


// User profile
Route::get('user/profile', [UserController::class, 'profile'])
->middleware('auth')
->name('user.profile');


// Route::get('/user/pay-bill', function () {
//     // Add functionality for bill payment here (perhaps redirect to a payment gateway)
//     return view('user.pay_bill');
// })->name('user.pay_bill');
// In web.php
// Route to handle payment


// Route for paying bills (using customer_id)
Route::get('/user/pay-bill', [UserController::class, 'payBill'])->name('user.pay_bill');
Route::get('/user/pay-bill/', [PaymentController::class, 'payBill'])->name('user.pay_bill');


Route::post('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::post('/payment/fail', [PaymentController::class, 'paymentFail'])->name('payment.fail');
Route::post('/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');



 

// User logout


Route::get('/logout', function () {
    Auth::logout(); // Log the user out
    request()->session()->invalidate(); // Invalidate the session
    request()->session()->regenerateToken(); // Regenerate CSRF token to prevent session fixation

    return redirect('/'); // Redirect to the homepage (index.blade.php)
})->name('logout');




Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');