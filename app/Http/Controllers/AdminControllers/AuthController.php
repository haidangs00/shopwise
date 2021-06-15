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
            return response()->json(['message' => 'Đăng nhập thành công!', 'status' => true, 'redirect' => route('dashboard')]);
        }
        return response()->json(['message' => 'Tài khoản hoặc mật khẩu không đúng, vui lòng thử lại!', 'status' => false]);
    }

    public function register()
    {
        return view('admin.guest.register');
    }

    public function signUp(RegisterRequest $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        $created = Admin::create($request->all());

        if($created)
        {
            return response()->json(['message' => 'Đăng ký thành công!', 'status' => true, 'redirect' => route('admins.login')]);
        }
        return response()->json(['message' => 'Đăng ký thất bại, vui lòng thử lại!', 'status' => false]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admins.login');
    }
}
