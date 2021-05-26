<?php

use App\Http\Controllers\AdminControllers\AuthController;
use App\Http\Controllers\AdminControllers\BannerController;
use App\Http\Controllers\AdminControllers\BrandController;
use App\Http\Controllers\AdminControllers\ColorController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\ProductController;
use App\Http\Controllers\AdminControllers\SizeController;
use App\Http\Controllers\ClientControllers\CartController;
use App\Http\Controllers\ClientControllers\ClientController;
use App\Http\Controllers\ClientControllers\CompareController;
use App\Http\Controllers\ClientControllers\WishListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('client.pages.index');
})->name('clients.home');

Route::middleware('guest:web')->group(function () {
    Route::get('/login', [ClientController::class, 'login'])->name('clients.login');
    Route::post('/login', [ClientController::class, 'signIn'])->name('clients.sign_in');
    Route::get('/register', [ClientController::class, 'register'])->name('clients.register');
    Route::post('/register', [ClientController::class, 'signUp'])->name('clients.sign_up');
});

Route::get('/products/{slug?}', [ClientController::class, 'products'])->name('clients.products');
Route::get('/product-detail/{id}', [ClientController::class, 'productDetail'])->name('clients.product_detail');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('clients.add_to_cart');
Route::get('/show-cart', [CartController::class, 'showCart'])->name('clients.show_cart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('clients.update_cart');
Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart'])->name('clients.delete_cart');
Route::get('/contact', [ClientController::class, 'contact'])->name('clients.contact');
Route::get('/about-us', [ClientController::class, 'aboutUs'])->name('clients.about_us');
Route::get('/blogs', [ClientController::class, 'blogs'])->name('clients.blogs');
Route::get('/checkout', [ClientController::class, 'checkout'])->name('clients.checkout');
Route::post('/checkout', [ClientController::class, 'proceedCheckout'])->name('clients.proceed_checkout');
Route::get('/quick-view-product/{id}', [ClientController::class, 'quickViewProduct'])->name('clients.quick_view_product');
Route::get('/compare', [CompareController::class, 'showCompare'])->name('clients.show_compare');
Route::get('/add-compare/{id}', [CompareController::class, 'addCompare'])->name('clients.add_compare');
Route::get('/delete-compare/{id}', [CompareController::class, 'deleteCompare'])->name('clients.delete_compare');

Route::middleware('client')->group(function () {
    Route::get('/my-account', [ClientController::class, 'account'])->name('clients.account');
    Route::get('/logout', [ClientController::class, 'logout'])->name('clients.logout');
    Route::get('/wishlist', [ClientController::class, 'wishlist'])->name('clients.wishlist');
    Route::get('/add-to-list/{id}', [WishListController::class, 'addToList'])->name('clients.add_to_list');
    Route::get('/remove-from-list/{id}', [WishListController::class, 'removeFromList'])->name('clients.remove_from_list');
    Route::post('/review-product', [ClientController::class, 'reviewProduct'])->name('clients.review_product');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.pages.index');
        })->name('dashboard');
        Route::get('/logout', [AuthController::class, 'logout'])->name('admins.logout');
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('colors', ColorController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('sizes', SizeController::class);
        Route::resource('banners', BannerController::class);

    });
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'login'])->name('admins.login');
        Route::post('/login', [AuthController::class, 'signIn'])->name('admins.sign_in');
        Route::get('/register', [AuthController::class, 'register'])->name('admins.register');
        Route::post('/register', [AuthController::class, 'signUp'])->name('admins.sign_up');
    });

});
