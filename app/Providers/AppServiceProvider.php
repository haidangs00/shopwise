<?php

namespace App\Providers;

use App\Helper\CompareHelper;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Helper\CartHelper;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with([
                'userLogged' => Auth::guard('web')->user(),
                'cart' => new CartHelper(),
                'compare' => new CompareHelper(),
                'activeCategories' => Category::where('status', 1)->withCount('products')->orderBy('name', 'ASC')->get(),
                'revenue' => Order::where('status', 2)->sum('total_price'),
                'totalCategory' => Category::count(),
                'totalProduct' => Product::count(),
                'totalUser' => User::count(),
            ]);
        });
        view()->composer('client.layouts.banner', function ($view) {
            $view->with([
                'banners' => Banner::where('status', 1)
                    ->where('date_begin', '<=', Carbon::now())
                    ->where('date_end', '>=', Carbon::now())
                    ->latest()
                    ->get()
            ]);
        });
    }
}
