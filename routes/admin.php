<?php
// routes/admin.php 

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/category', function () {
        return view('admin.category.category');
    })->name('category');

    // Logout route
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Route::get('user/register', [UserController::class, 'showRegistrationForm'])->name('register.form');
    // Route::post('user/register', [UserController::class, 'register'])->name('register');

});

 


// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'web']], function () {

// });


///register

// Route::get('user/register', [UserController::class, 'showRegistrationForm'])->name('register.form');
// Route::post('user/register', [UserController::class, 'register'])->name('register');


// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
// Route::post('/login', [LoginController::class, 'login'])->name('login');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
