<?php

use Illuminate\Support\Facades\Route;

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


// Admin routes
Route::group(['middleware' => ['auth:admin']], function () {
    // Add your admin routes here
});

// Manager routes
Route::group(['middleware' => ['auth:manager']], function () {
    // Add your manager routes here
});

// Employee routes
Route::group(['middleware' => ['auth:employee']], function () {
    // Add your employee routes here
});

// Customer routes
Route::group(['middleware' => ['auth:customer']], function () {
    // Add your customer routes here
});

