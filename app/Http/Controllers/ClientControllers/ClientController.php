<?php

namespace App\Http\Controllers\ClientControllers;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ForgotPasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Contact\StoreRequest as ContactStoreRequest;
use App\Http\Requests\Checkout\StoreRequest as CheckoutStoreRequest;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Image;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Size;
use App\Models\Social;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Socialite;
use Session;

class ClientController extends Controller
{
    public function login()
    {
        $url_prev = url()->previous();
        return view('client.pages.login', compact('url_prev'));
    }

    public function signIn(LoginRequest $request)
    {
        $remember = $request->has('remember');
        $login = Auth::guard('web')->attempt($request->only('user_name', 'password'), $remember);

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
        $created = User::create($request->all());

        if ($created) {
            return response()->json(['message' => 'Đăng ký thành công!', 'status' => true, 'redirect' => route('clients.login')]);
        }
        return response()->json(['message' => 'Đăng ký thất bại!', 'status' => false]);
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

    public function sendContact(ContactStoreRequest $request)
    {
        $created = Contact::create($request->all());

        if ($created) {
            return response()->json(['message' => 'Xin cảm ơn! Chúng tôi sẽ liên hệ với bạn sớm nhất!', 'status' => true]);
        }
        return response()->json(['message' => 'Đã xảy ra lỗi, vui lòng thử lại!', 'status' => false]);
    }

    public function blogs()
    {
        $dates = Blog::selectRaw('year(created_at) year, monthname(created_at) month, day(created_at) day, count(*) data')
            ->groupBy('year', 'month', 'day')
            ->orderBy('month', 'desc')
            ->get();

        $blogCategories = BlogCategory::where('status', 1)->get();
        $blogs = Blog::paginate(4);
        return view('client.pages.blogs', compact('blogCategories', 'blogs', 'dates'));
    }

    public function blogDetail($id)
    {
        $dates = Blog::selectRaw('year(created_at) year, monthname(created_at) month, day(created_at) day, count(*) data')
            ->groupBy('year', 'month', 'day')
            ->orderBy('month', 'desc')
            ->get();
        $blogs = Blog::paginate(4);

        $blogCategories = BlogCategory::where('status', 1)->get();
        $blog = Blog::find($id);
        return view('client.pages.blog-detail', compact('blog', 'blogCategories', 'dates', 'blogs'));
    }

    public function wishlist()
    {
        $wishlist = WishList::where('user_id', Auth::user()->id)->get();
        return view('client.pages.wishlist', compact('wishlist'));
    }

    public function checkout()
    {
        $payments = Payment::whereStatus(1)->get();
        return view('client.pages.checkout', compact('payments'));
    }

    public function proceedCheckout(CheckoutStoreRequest $request, CartHelper $cart)
    {
        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'phone' => $request->phone,
                'address' => $request->address,
                'total_price' => $cart->total_price,
                'total_quantity' => $cart->total_quantity,
                'description' => $request->description,
                'ship_id' => 1,
                'payment_id' => $request->payment
            ]);

            foreach ($cart->items as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'color_id' => $item['color'],
                    'size_id' => $item['size'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }
            DB::commit();
            $cart->clear();

            // Send mail confirm
//            $toName = 'Shopwise';
//            $toMail = Auth::user()->email;
//
//            $data = array('title' => 'Xác nhận đơn hàng!', 'user_name' => Auth::user()->name);
//
//            Mail::send('client.send-mail.mail', $data, function ($message) use ($toName, $toMail) {
//                $message->to($toMail)->subject('Xác nhận đặt hàng Shopwise');
//                $message->from($toMail, $toName);
//            });

            return response()->json(['redirect' => route('clients.order_completed'), 'status' => true]);
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error($ex->getMessage());
            return response()->json(['message' => 'Đã xảy ra lỗi! Xin vui lòng thử lại sau!', 'status' => false]);
        }
    }

    public function products(Request $request, $slug = null)
    {
//        dd($request->all());
        $products = Product::query()->where('status', 1)->when($slug != null, function ($query) use ($slug) {
            $category = Category::where('slug', $slug)->first();
            $query->whereCategoryId($category->id);
        })->when($request->search_key != null, function ($query) use ($request) {
            $query->where('name', 'like', "%{$request->search_key}%");
        })->when($request->brands != null, function ($query) use ($request) {
            $query->whereIn('brand_id', $request->brands);
        })->when($request->price_first != null && $request->price_second != null, function ($query) use ($request) {
            $query->whereBetween('promotional_price', [$request->price_first, $request->price_second])->orderBy('promotional_price', 'ASC');
        })->when($request->colors != null, function ($query) use ($request) {
            $query->join('product_color', 'product_color.product_id', '=', 'products.id')->whereIn('color_id', $request->colors);
        })->when($request->sizes != null, function ($query) use ($request) {
            $query->join('product_size', 'product_size.product_id', '=', 'products.id')->whereIn('size_id', $request->sizes);
        })->paginate(5);

        $brands = Brand::where('status', 1)->get();
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
        $relatedProducts = Product::whereCategoryId($product->category_id)->get();
        return view('client.pages.product-detail', compact('product', 'images', 'relatedProducts'));
    }

    public function quickViewProduct($id)
    {
        $product = Product::find($id);
        $images = Image::where('product_id', $id)->get();
//        dd($images);

        return view('client.layouts.products.quick-view', compact('product', 'images'));
    }

    public function reviewProduct(Request $request)
    {
        try {
            DB::beginTransaction();
            Comment::create([
                'content' => $request->message,
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id
            ]);

            Rating::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'star' => $request->star
            ]);
            DB::commit();
            return response()->json(['message' => 'Đánh giá của bạn đã được ghi lại! Xin cảm ơn!', 'status' => true]);
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error("Đánh giá sản phẩm: " . $ex->getMessage());
            return response()->json(['message' => 'Đánh giá thất bại!', 'status' => false]);
        }
    }


//    Login Google

    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $authUser = $this->findOrCreateUser($user, 'google');

        auth('web')->login($authUser);

        return redirect()->route('clients.home');
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = Social::where('provider_id', $user->id)->first();
        if ($authUser) {
            $account_name = User::where('id', $authUser->user)->first();
            return $account_name;
        }

        $social = Social::create([
            'provider_id' => $user->id,
            'provider' => $provider
        ]);
        $accountUser = User::where('email', $user->email)->first();
        if (!$accountUser) {
            $accountUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'user_name' => $user->email,
                'password' => '',
                'phone' => '',
            ]);
        }
        $social->login()->associate($accountUser);
        $social->save();

        $account_name = User::where('id', $social->user)->first();
        return $account_name;
    }

    public function forgotPassword()
    {
        return view('client.pages.forgot-password');
    }

    public function recoverPassword(ForgotPasswordRequest $request)
    {
        $now = Carbon::now()->format('d-m-Y');
        $title = 'Lấy lại mật khẩu tài khoản Shopwise '.$now;
        $user = User::whereEmail($request->email)->first();

        if($user) {
            $toName = 'Shopwise';
            $toMail = $request->email;
            $token = \Str::random();
            $user->token = $token;
            $user->save();

            $link = url('/reset-password?email='.$toMail.'&token='.$token);

            $data = array('title' => $title, 'link' => $link, 'email' => $toMail);

            Mail::send('client.send-mail.reset-password', $data, function ($message) use ($toName, $toMail, $title) {
                $message->to($toMail)->subject($title);
                $message->from($toMail, $toName);
            });

            return response()->json(['message' => 'Gửi mail thành công! Vui lòng kiểm tra email của bạn.', 'status' => true]);

        } else {
            return response()->json(['message' => 'Email của bạn chưa được đăng ký tài khoản!', 'status' => false]);
        }
    }

    public function resetPassword()
    {
        return view('client.pages.reset-password');
    }

    public function updateNewPassword(ResetPasswordRequest $request)
    {
        $token = \Str::random();
        $user = User::whereEmail($request->email)->whereToken($request->token)->first();
        if($user) {
            $user->password = bcrypt($request->new_password);
            $user->token = $token;
            $user->save();

            return response()->json(['message' => 'Xác nhận mật khẩu thành công!', 'status' => true, 'redirect' => route('clients.login')]);
        } else {
            return response()->json(['message' => 'Vui lòng nhập lại email vì link đã hết hạn!', 'status' => false]);
        }
    }
}
