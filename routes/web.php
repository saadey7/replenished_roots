<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Website\WebsiteController;
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

Route::get('/', [WebsiteController::class,'index']);
Route::get('/shop', [WebsiteController::class,'shop']);
Route::get('/product-detail/{id}', [WebsiteController::class,'proDetail']);
Route::get('/about-us', [WebsiteController::class,'aboutUs']);
Route::get('/login', [WebsiteController::class,'login']);
Route::get('/register', [WebsiteController::class,'register']);

Route::get('/admin', function () {
    return redirect('/admin/login');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [WebsiteController::class,'home']);
});