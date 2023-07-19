<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed for Admin role
            return redirect()->intended('/admin/dashboard');
        } elseif (Auth::guard('manager')->attempt($credentials)) {
            // Authentication passed for Manager role
            return redirect()->intended('/manager/dashboard');
        } elseif (Auth::guard('employee')->attempt($credentials)) {
            // Authentication passed for Employee role
            return redirect()->intended('/employee/dashboard');
        } elseif (Auth::guard('customer')->attempt($credentials)) {
            // Authentication passed for Customer role
            return redirect()->intended('/customer/dashboard');
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');
    }





    public function logout(Request $request)
    {
        $guard = $this->getGuard($request);
        Auth::guard($guard)->logout();

        return redirect()->route('login');
    }

    protected function getGuard(Request $request)
    {
        if ($request->route()->getPrefix() == '/admin') {
            return 'admin';
        } elseif ($request->route()->getPrefix() == '/manager') {
            return 'manager';
        } elseif ($request->route()->getPrefix() == '/employee') {
            return 'employee';
        } elseif ($request->route()->getPrefix() == '/customer') {
            return 'customer';
        }

        return 'web';
    }
}
