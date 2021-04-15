<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControllers\CategoryController;
use App\Http\Controllers\AdminControllers\ProductController;

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

Route::get('/', function () {
    return view('client.pages.index');
});
Route::prefix('admin')->group(function (){
   Route::get('/', function(){
       return view('admin.pages.index');
   })->name('dashboard');
   Route::resource('categories', CategoryController::class);
   Route::resource('products', ProductController::class);
});
