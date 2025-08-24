<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Website\OrderController;
use App\Http\Controllers\Website\UserController;
use App\Models\Legal;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/process_login', [UserController::class,'process_login']);
Route::get('/register', [UserController::class,'register']);
Route::post('/process_register', [UserController::class,'process_register']);
Route::post('/logout', [UserController::class,'logout']);

Route::get('/', [WebsiteController::class,'index']);
Route::get('/shop', [WebsiteController::class,'shop']);
Route::get('/product-detail/{id}', [WebsiteController::class,'proDetail']);
Route::get('/about-us', [WebsiteController::class,'aboutUs']);
Route::get('/cart', [WebsiteController::class,'cart']);
Route::get('/checkout', [WebsiteController::class,'checkout']);

Route::get('/admin', function () {
    return redirect('/admin/login');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [WebsiteController::class,'index']);
    Route::post('/add_to_wishlist', [WebsiteController::class,'add_to_wishlist']);
    Route::post('/add_to_cart', [WebsiteController::class,'add_to_cart']);
    Route::post('/cartUpdate', [WebsiteController::class,'cartUpdate']);
    Route::get('/remove_cart_item/{id}', [WebsiteController::class, 'removeCartItem']);
    Route::post('/create-order', [OrderController::class, 'createOrder']);
    Route::post('/store-feedback', [WebsiteController::class, 'storeFeedback']);

});