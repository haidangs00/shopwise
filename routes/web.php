<?php

use App\Http\Controllers\AdminControllers\AuthController;
use App\Http\Controllers\AdminControllers\BrandController;
use App\Http\Controllers\AdminControllers\ColorController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\ProductController;
use App\Http\Controllers\AdminControllers\SizeController;
use App\Http\Controllers\ClientControllers\CartController;
use App\Http\Controllers\ClientControllers\ClientController;
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

Route::get('/login', [ClientController::class, 'login'])->name('clients.login');
Route::post('/login', [ClientController::class, 'signIn'])->name('clients.sign_in');
Route::get('/register', [ClientController::class, 'register'])->name('clients.register');
Route::post('/register', [ClientController::class, 'signUp'])->name('clients.sign_up');

Route::get('/products', [ClientController::class, 'products'])->name('clients.products');
Route::get('/product-detail/{id}', [ClientController::class, 'productDetail'])->name('clients.product_detail');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('clients.add_to_cart');
Route::get('/show-cart', [CartController::class, 'showCart'])->name('clients.show_cart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('clients.update_cart');
Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart'])->name('clients.delete_cart');
Route::get('/compare', [ClientController::class, 'compare'])->name('clients.compare');
Route::get('/contact', [ClientController::class, 'contact'])->name('clients.contact');
Route::get('/blogs', [ClientController::class, 'blogs'])->name('clients.blogs');
Route::get('/wishlist', [ClientController::class, 'wishlist'])->name('clients.wishlist');
Route::get('/checkout', [ClientController::class, 'checkout'])->name('clients.checkout');

Route::middleware('client')->group(function () {
    Route::get('/my-account', [ClientController::class, 'account'])->name('clients.account');
    Route::get('/logout', [ClientController::class, 'logout'])->name('clients.logout');
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
        Route::prefix('manager')->group(function () {
            Route::resource('categories', CategoryController::class);
            Route::resource('products', ProductController::class);
            Route::resource('colors', ColorController::class);
            Route::resource('brands', BrandController::class);
            Route::resource('sizes', SizeController::class);
        });
    });

    Route::get('/login', [AuthController::class, 'login'])->name('admins.login');
    Route::post('/login', [AuthController::class, 'signIn'])->name('admins.sign_in');
    Route::get('/register', [AuthController::class, 'register'])->name('admins.register');
    Route::post('/register', [AuthController::class, 'signUp'])->name('admins.sign_up');
});
