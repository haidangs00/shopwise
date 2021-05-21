<?php

namespace App\Http\Controllers\ClientControllers;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\Request;
use Auth;

class ClientController extends Controller
{
    public function login()
    {
        $url_prev = url()->previous();
        return view('client.pages.login', compact('url_prev'));
    }

    public function signIn(LoginRequest $request)
    {
        $login = Auth::guard('web')->attempt($request->only('user_name', 'password'));

        if ($login) {
            if ($request->action == url('/checkout')) {
                $redirect = route('clients.checkout');
            } else {
                $redirect = route('clients.home');
            }
            return response()->json(['message' => 'Đăng nhập thành công!', 'status' => true, 'redirect' => $redirect]);
        }
        return response()->json(['message' => 'Tài khoản hoặc mật khẩu không đúng, vui lòng thử lại!', 'status' => false]);
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

    public function aboutUs()
    {
        return view('client.pages.about-us');
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
        $wishlist = WishList::where('user_id', Auth::user()->id)->get();
        return view('client.pages.wishlist', compact('wishlist'));
    }

    public function checkout()
    {
        return view('client.pages.checkout');
    }

    public function proceedCheckout(Request $request, CartHelper $cart)
    {
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'phone' => $request->phone,
            'address' => $request->address,
            'total_price' => $cart->total_price,
            'total_quantity' => $cart->total_quantity,
            'description' => $request->description,
            'ship_id' => 1,
            'payment_id' => 1
        ]);

        foreach ($cart->items as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }
        $cart->clear();
        return view('client.pages.order-completed');
    }

    public function products($slug = null)
    {
        if ($slug) {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $category->id)->get();
        } else {
            $products = Product::all();
        }
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();

        return view('client.pages.products', compact('products', 'brands', 'colors', 'sizes'));
    }

    public function productDetail($id)
    {
        $product = Product::find($id);
        $images = Image::where('product_id', $id)->get();
        return view('client.pages.product-detail', compact('product', 'images'));
    }

    public function quickViewProduct($id)
    {
        $product = Product::find($id);
        $images = Image::where('product_id', $id)->get();
        return view('client.layouts.products.quick-view', compact('product', 'images'));
    }

}
