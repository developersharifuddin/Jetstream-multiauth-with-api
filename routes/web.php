<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/home', function () { return view('admin.home'); })->name('home');
});


// // Admin routes
// Route::group(['middleware' => ['auth:admin']], function () {
//     // Add your admin routes here
// });

// // Manager routes
// Route::group(['middleware' => ['auth:manager']], function () {
//     // Add your manager routes here
// });

// // Employee routes
// Route::group(['middleware' => ['auth:employee']], function () {
//     // Add your employee routes here
// });

// // Customer routes
// Route::group(['middleware' => ['auth:customer']], function () {
//     // Add your customer routes here
// });

// // Admin routes
// Route::middleware('auth:admin')->group(function () {
//     // Add your admin-specific routes here
// });

// // Manager routes
// Route::middleware('auth:manager')->group(function () {
//     // Add your manager-specific routes here
// });

// // Employee routes
// Route::middleware('auth:employee')->group(function () {
//     // Add your employee-specific routes here
// });

// // Branch Manager routes
// Route::middleware('auth:branch_manager')->group(function () {
//     // Add your branch manager-specific routes here
// });
// // Branch Manager routes
// Route::middleware('auth:customer')->group(function () {
//     // Add your branch manager-specific routes here
// });


Route::get('/login', 'AuthController@showLoginForm')->name('login');
Route::post('/login', 'AuthController@login');

Route::prefix('admin')->group(function () {
    // ... other admin routes ...
    Route::post('/logout', 'AuthController@logout')->name('admin.logout');
});


Route::middleware(['auth:admin'])->group(function () {
    Route::post('/admin/logout', 'AuthController@logout')->name('admin.logout');
});














// Admin routes
Route::middleware(['auth:admin', 'check.role:admin'])->group(function () {
    // Add your admin-specific routes here
});

// Manager routes
Route::middleware(['auth:manager', 'check.role:manager'])->group(function () {
    // Add your manager-specific routes here
});

// Employee routes
Route::middleware(['auth:employee', 'check.role:employee'])->group(function () {
    // Add your employee-specific routes here
});

// Branch Manager routes
Route::middleware(['auth:customer', 'check.role:customer'])->group(function () {
    // Add your branch manager-specific routes here
});
// Branch Manager routes
Route::middleware(['auth:branch_manager', 'check.role:branch_manager'])->group(function () {
    // Add your branch manager-specific routes here
});

