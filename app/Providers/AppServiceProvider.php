<?php

namespace App\Providers;

use App\Helper\CompareHelper;
use App\Models\Category;
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
        view()->composer('*', function($view){
            $view->with([
                'cart' => new CartHelper(),
                'compare' => new CompareHelper(),
                'categories' => Category::where('status', 1)->withCount('products')->orderBy('name', 'ASC')->get()
            ]);
        });
    }
}
