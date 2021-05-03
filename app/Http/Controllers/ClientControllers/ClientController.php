<?php

namespace App\Http\Controllers\ClientControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ClientController extends Controller
{
    public function login()
    {
        return view('client.pages.login');
    }

    public function signIn(LoginRequest $request)
    {
        $login = Auth::guard('web')->attempt($request->only('user_name', 'password'));
        if ($login) {
            return redirect()->route('clients.home');
        } else {
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('client.pages.register');
    }

    public function signUp(RegisterRequest $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        User::create($request->all());

        return redirect()->route('clients.login');
    }

    public function account()
    {
        return view('client.pages.my-account');
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('clients.login');
    }

    public function compare()
    {
        return view('client.pages.compare');
    }

    public function contact()
    {
        return view('client.pages.contact');
    }

    public function blogs()
    {
        return view('client.pages.blogs');
    }

    public function wishlist()
    {
        return view('client.pages.wishlist');
    }

    public function checkout()
    {
        return view('client.pages.checkout');
    }

    public function products()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('client.pages.products', compact('categories', 'products'));
    }

    public function productDetail($id)
    {
        $product = Product::find($id);
        $images = Image::where('product_id', $id)->get();
        return view('client.pages.product-detail', compact('product', 'images'));
    }

}
