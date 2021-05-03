<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.guest.login');
    }

    public function signIn(LoginRequest $request)
    {
        $login = Auth::guard('admin')->attempt($request->only('user_name', 'password'));
        if($login)
        {
            return redirect()->route('dashboard');
        }
        else {
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('admin.guest.register');
    }

    public function signUp(RegisterRequest $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        Admin::create($request->all());

        return redirect()->route('admins.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admins.login');
    }
}
