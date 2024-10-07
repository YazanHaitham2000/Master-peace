<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropertyForSaleController;
use App\Http\Controllers\PropertyForRentController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

// use App\Http\Controllers\PropertiesForSaleController2;
// use App\Http\Controllers\PropertiesForRentController2;
// use App\Http\Controllers\DashboardController2;


Route::middleware(['auth'])->group(function () {
    // Your protected routes here
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
// routes/web.php
Route::get('/dashboard', function () {
    return view('dashboard'); // Ensure this matches the name of your Blade file

 

});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth', 'admin')->name('dashboard');



    // Owner routes
    Route::get('owners', [OwnerController::class, 'index'])->name('owners.index');
    Route::get('owners/create', [OwnerController::class, 'create'])->name('owners.create');
    Route::post('owners', [OwnerController::class, 'store'])->name('owners.store');
    Route::get('owners/{owner}', [OwnerController::class, 'show'])->name('owners.show');
    Route::get('owners/{owner}/edit', [OwnerController::class, 'edit'])->name('owners.edit');
    Route::put('owners/{owner}', [OwnerController::class, 'update'])->name('owners.update');
    Route::delete('owners/{owner}', [OwnerController::class, 'destroy'])->name('owners.destroy');

    // Tenant routes
    Route::get('tenants', [TenantController::class, 'index'])->name('tenants.index');
    Route::get('tenants/create', [TenantController::class, 'create'])->name('tenants.create');
    Route::post('tenants', [TenantController::class, 'store'])->name('tenants.store');
    Route::get('tenants/{tenant}', [TenantController::class, 'show'])->name('tenants.show');
    Route::get('tenants/{tenant}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
    Route::put('tenants/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
    Route::delete('tenants/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');






  // Routes for Properties for Sale
Route::resource('properties-for-sale', PropertyForSaleController::class)
->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
->names([
    'index' => 'properties-for-sale.index',
    'create' => 'properties-for-sale.create',
    'store' => 'properties-for-sale.store',
    'edit' => 'properties-for-sale.edit',
    'update' => 'properties-for-sale.update',
    'destroy' => 'properties-for-sale.destroy',
]);

// Routes for Properties for Rent
Route::resource('properties-for-rent', PropertyForRentController::class)
->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
->names([
    'index' => 'properties-for-rent.index',
    'create' => 'properties-for-rent.create',
    'store' => 'properties-for-rent.store',
    'edit' => 'properties-for-rent.edit',
    'update' => 'properties-for-rent.update',
    'destroy' => 'properties-for-rent.destroy',
]);



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/dashboard', [DashboardController::class, 'admin'])->middleware('auth', 'admin')->name('dashboard');

// Fallback route for authenticated users
Route::get('/home', function () {
    if (auth()->user()->role_id == 1) {
        return redirect()->route('dashboard2');
    } elseif (auth()->user()->role_id == 3) {
        return redirect()->route('dashboard');
    }
})->middleware('auth');



Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});



/////////////////////owner dashboard///////////////////////////
use App\Http\Controllers\PropertiesForSaleController2;
use App\Http\Controllers\PropertiesForRentController2;
use App\Http\Controllers\DashboardController2;

Route::middleware(['auth', 'owner'])->group(function () {
    Route::get('/owners2/dashboard', [DashboardController2::class, 'show'])->name('owners2.dashboard');
    
    Route::resource('properties-for-sale1', PropertiesForSaleController2::class);
    Route::resource('properties-for-rent1', PropertiesForRentController2::class);
});


// routes/web.php


// Other routes...

Route::get('/owners2/properties/create', [DashboardController2::class, 'create'])->name('properties.create');
Route::post('/owners2/properties', [DashboardController2::class, 'store'])->name('properties.store');

use App\Http\Controllers\PropertyController;

// Existing routes...
Route::resource('properties', PropertyController::class);



///////////////////////////tenant2////////////////////////

use App\Http\Controllers\HomeController;


Route::get('/tenants2/home', [HomeController::class, 'home'])->name('tenants2.home');
Route::get('/tenants2/contact', [TenantController::class, 'contact'])->name('tenants2.contact');
Route::get('/tenants2/home', [TenantController::class, 'home'])->name('tenants2..home');
