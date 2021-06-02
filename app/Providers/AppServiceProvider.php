<?php

namespace App\Providers;

use App\Helper\CompareHelper;
use App\Models\Banner;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Helper\CartHelper;

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
                'cart' => new CartHelper(),
                'compare' => new CompareHelper(),
                'activeCategories' => Category::where('status', 1)->withCount('products')->orderBy('name', 'ASC')->get()
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
