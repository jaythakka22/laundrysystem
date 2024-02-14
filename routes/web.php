<?php

use App\Models\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('aboutus', function () {
    return view('about');
});

Route::get('/', [PageController::class, 'indexPage'])->name('index');
Route::get('aboutus', [PageController::class, 'aboutUs'])->name('about');
Route::get('contactus', [PageController::class, 'contactUs'])->name('contactus');
Route::get('pricing', [PageController::class, 'pricing'])->name('pricing');
Route::get('service', [PageController::class, 'service'])->name('service');
Route::get('signup', [PageController::class, 'signUp'])->name('signup');
Route::get('report', [PageController::class, 'report'])->name('report');
Route::get('admindashboard', [PageController::class, 'adminDashboard'])->name('admindashboard');
Route::get('adminlogin', [PageController::class, 'adminLoginPage'])->name('adminlogin');
Route::post('/admin/login', [UserAuthController::class, 'adminLogin'])->name('admin.login');
Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('index')->with('success', 'You have successfully logged out.');
});

Route::get('/vieworder/{id}',[OrdersController::class, 'show'])->name('order.show');
Route::put('/orders/{id}', [OrdersController::class, 'update'])->name('orders.update');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register');
Route::any('login_user', [UserAuthController::class, 'login'])->name('user.login');
Route::get('serviceslist', [ServicesController::class, 'index'])->name('services.list');
Route::get('orderslist', [OrdersController::class, 'index'])->name('orders.list');
Route::post('services', [ServicesController::class, 'store'])->name('services.store');
Route::get('createservice', [ServicesController::class, 'create'])->name('services.create');
Route::post('/checkout',  [OrdersController::class, 'store'])->name('checkout');



