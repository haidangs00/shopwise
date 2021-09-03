<?php

use App\Http\Controllers\AdminControllers\AccountController;
use App\Http\Controllers\AdminControllers\AdminController;
use App\Http\Controllers\AdminControllers\AuthController;
use App\Http\Controllers\AdminControllers\BannerController;
use App\Http\Controllers\AdminControllers\BlogCategoryController;
use App\Http\Controllers\AdminControllers\BlogController;
use App\Http\Controllers\AdminControllers\BrandController;
use App\Http\Controllers\AdminControllers\CKEditorController;
use App\Http\Controllers\AdminControllers\ColorController;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\CommentController;
use App\Http\Controllers\AdminControllers\ContactController;
use App\Http\Controllers\AdminControllers\OrderController;
use App\Http\Controllers\AdminControllers\PaymentController;
use App\Http\Controllers\AdminControllers\ProductController;
use App\Http\Controllers\AdminControllers\RoleController;
use App\Http\Controllers\AdminControllers\SizeController;
use App\Http\Controllers\AdminControllers\UserController;
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
    Route::get('/forgot-password', [ClientController::class, 'forgotPassword'])->name('clients.forgot_password');
    Route::post('/forgot-password', [ClientController::class, 'recoverPassword'])->name('clients.recover_password');
    Route::get('/reset-password', [ClientController::class, 'resetPassword'])->name('clients.reset_password');
    Route::post('/reset-password', [ClientController::class, 'updateNewPassword'])->name('clients.update_new_password');

    //Login Google
    Route::get('/login-google', [ClientController::class, 'loginGoogle'])->name('clients.login_google');
    Route::get('/google/callback', [ClientController::class, 'callbackGoogle'])->name('clients.callback_google');

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
Route::get('/blog-detail/{id}', [ClientController::class, 'blogDetail'])->name('clients.blog_detail');
Route::get('/checkout', [ClientController::class, 'checkout'])->name('clients.checkout');
Route::post('/checkout', [ClientController::class, 'proceedCheckout'])->name('clients.proceed_checkout');
Route::get('/quick-view-product/{id}', [ClientController::class, 'quickViewProduct'])->name('clients.quick_view_product');
Route::get('/compare', [CompareController::class, 'showCompare'])->name('clients.show_compare');
Route::get('/add-compare/{id}', [CompareController::class, 'addCompare'])->name('clients.add_compare');
Route::get('/delete-compare/{id}', [CompareController::class, 'deleteCompare'])->name('clients.delete_compare');
Route::post('/send-contact', [ClientController::class, 'sendContact'])->name('clients.send_contact');
Route::get('/order-completed', [OrderController::class, 'orderCompleted'])->name('clients.order_completed');

Route::middleware('client')->group(function () {
    Route::get('/my-account', [ClientController::class, 'account'])->name('clients.account');
    Route::get('/logout', [ClientController::class, 'logout'])->name('clients.logout');
    Route::get('/wishlist', [ClientController::class, 'wishlist'])->name('clients.wishlist');
    Route::get('/add-to-list/{id}', [WishListController::class, 'addToList'])->name('clients.add_to_list');
    Route::get('/remove-from-list/{id}', [WishListController::class, 'removeFromList'])->name('clients.remove_from_list');
    Route::post('/review-product', [ClientController::class, 'reviewProduct'])->name('clients.review_product');
    Route::put('/change-password', [ClientController::class, 'changePassword'])->name('clients.change_password');
    Route::put('/change-info', [ClientController::class, 'changeInfo'])->name('clients.change_info');
    Route::get('/order-detail/{id}', [ClientController::class, 'orderDetail'])->name('clients.order_detail');

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

        Route::prefix('manager')->middleware('checkAcl:manager')->group(function () {
            Route::resource('categories', CategoryController::class);
            Route::patch('/category/update-status/{id}', [CategoryController::class, 'updateStatus'])->name('categories.update_status');
            Route::resource('products', ProductController::class);
            Route::patch('/product/update-status/{id}', [ProductController::class, 'updateStatus'])->name('products.update_status');
            Route::resource('brands', BrandController::class);
            Route::patch('/brand/update-status/{id}', [BrandController::class, 'updateStatus'])->name('brands.update_status');
            Route::resource('banners', BannerController::class);
            Route::resource('blogCategories', BlogCategoryController::class);
            Route::patch('/blogCategories/update-status/{id}', [BlogCategoryController::class, 'updateStatus'])->name('blogCategories.update_status');
            Route::patch('/banner/update-status/{id}', [BannerController::class, 'updateStatus'])->name('banners.update_status');
            Route::resource('blogs', BlogController::class);
            Route::patch('/blog/update-status/{id}', [BlogController::class, 'updateStatus'])->name('blogs.update_status');
            Route::resource('colors', ColorController::class);
            Route::resource('sizes', SizeController::class);
            Route::resource('orders', OrderController::class);
            Route::resource('payments', PaymentController::class);
            Route::patch('/payment/update-status/{id}', [PaymentController::class, 'updateStatus'])->name('payments.update_status');
            Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
            Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
            Route::post('/reply-comment', [CommentController::class, 'replyComment'])->name('comments.reply_comment');
            Route::patch('/comment/update-status/{id}', [CommentController::class, 'updateStatus'])->name('comments.update_status');
            Route::get('/contact', [ContactController::class, 'index'])->name('contacts.index');
            Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
        });

        //Manager Account
        Route::prefix('account')->group(function () {
            Route::middleware('checkAcl:admin')->group(function () {
                Route::resource('admins', AdminController::class);
                Route::patch('/admins/update-status/{id}', [AdminController::class, 'updateStatus'])->name('admins.update_status');
            });
            Route::middleware('checkAcl:user')->group(function () {
                Route::resource('users', UserController::class)->middleware('checkAcl:user');
                Route::patch('/users/update-status/{id}', [UserController::class, 'updateStatus'])->name('users.update_status');
            });
            Route::resource('roles', RoleController::class)->middleware('checkAcl:role');

        });

        //Profile
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');

        //ckeditor upload images
        Route::post('ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('ckeditor_upload');
    });
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'login'])->name('admins.login');
        Route::post('/login', [AuthController::class, 'signIn'])->name('admins.sign_in');
        Route::get('/register', [AuthController::class, 'register'])->name('admins.register');
        Route::post('/register', [AuthController::class, 'signUp'])->name('admins.sign_up');
    });

});
