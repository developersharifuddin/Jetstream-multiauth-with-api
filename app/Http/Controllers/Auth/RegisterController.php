<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->create($request->all());

        $guard = $this->getGuard($request);

        return redirect()->route($guard . '.login')->with('success', 'Registration successful. Please login.');
    }

    protected function validator(array $data)
    {
        // Implement your validation rules for each role here
    }

    protected function create(array $data)
    {
        // Implement user creation logic for each role here
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

