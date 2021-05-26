<?php

namespace App\Http\Controllers\ClientControllers;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Rating;
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

    public function products(Request $request, $slug = null)
    {
//        dd($request->all());
        $products = Product::query()->select('*')->when($slug != null, function ($query) use ($slug) {
            $category = Category::where('slug', $slug)->first();
            $query->whereCategoryId($category->id);
        })->when($request->brands != null, function ($query) use ($request) {
            $query->whereIn('brand_id', $request->brands);
        })->when($request->price_first != null && $request->price_second != null, function ($query) use ($request) {
            $query->whereBetween('promotional_price', [$request->price_first, $request->price_second])->orderBy('promotional_price', 'ASC');
        })->when($request->colors != null, function ($query) use ($request) {
            $query->join('product_colors', 'product_colors.product_id', '=', 'products.id')->whereIn('color_id', $request->colors);
        })->when($request->sizes != null, function ($query) use ($request) {
            $query->join('product_sizes', 'product_sizes.product_id', '=', 'products.id')->whereIn('size_id', $request->sizes);
        })->get();

        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();

        $minPrice = Product::min('promotional_price');
        $maxPrice = Product::max('promotional_price');

        return view('client.pages.products', compact('products', 'brands', 'colors', 'sizes', 'minPrice', 'maxPrice'));
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

    public function reviewProduct(Request $request)
    {
        $comment = Comment::create([
            'content' => $request->message,
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id
        ]);

        $rating = Rating::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'star' => $request->star
        ]);

        if ($comment && $rating) {
            return response()->json(['message' => 'Đánh giá của bạn đã được ghi lại! Xin cảm ơn!', 'status' => true]);
        }
        return response()->json(['message' => 'Đánh giá thất bại!', 'status' => false]);
    }
}
