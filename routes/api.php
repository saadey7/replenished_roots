<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

//User Auth Api Route
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('forgot', [UserController::class, 'forgot']);
Route::post('confirm-code', [UserController::class, 'confirmCode']);
Route::post('reset', [UserController::class, 'reset']);
Route::post('change-password', [UserController::class, 'changePassword']); //Bear Token Needed
Route::post('edit', [UserController::class, 'edit']);
Route::post('verify', [UserController::class, 'verifyEmail']);
Route::get('details', [UserController::class, 'details']); //Bear Token Needed
Route::get('delete-user', [UserController::class, 'delete']); //Delete All user
Route::post('update-fcm', [UserController::class, 'updateFcmToken']);
Route::get('deleteUser', [UserController::class, 'deleteUser']);


Route::get('get-Cookies', [UserController::class, 'get_Cookies']);


// All Cities And Province
Route::get('/province', [UserController::class, 'province']);

Route::get('/saveStoreId', [OrderController::class, 'saveStoreId']);

// Get Cities List With Province
Route::post('/getcities', [UserController::class, 'getcities']);


Route::get('/terms', [UserController::class, 'terms']);

// Schedule Time
Route::get('/allschedule', [OrderController::class, 'allschedule']);

// Schedule Time
Route::post('/scheduletime', [OrderController::class, 'scheduletime']);

// All Product
Route::get('/all_store', [ProductController::class, 'all_store']);
    
// Home Api
Route::post('/home', [ProductController::class, 'home']);

Route::group(['middleware' =>'auth:api'], function () {

    //User
    Route::post('delete-user', [UserController::class, 'deleteUser']); //User deleted

    // Start Notification Routes
    
    // Show All Notification
    Route::get('viewAllNotification', [NotificationController::class, 'viewAllNotification']);
    
    // Change Notification Status
    Route::post('changeStatusNotification', [NotificationController::class, 'changeStatusNotification']);
    
    // Change Notification Status
    Route::get('AllchangeStatusNotification', [NotificationController::class, 'AllchangeStatusNotification']);
    // tificatio
    Route::get('NotificationCount', [NotificationController::class, 'NotificationCount']);
    
    // Delete Notification
    Route::post('deleteNotification', [NotificationController::class, 'deleteNotification']);
    
    // End Notification Routes
    
    // All Product
    Route::post('/all_pro', [ProductController::class, 'all_pro']);
    
    // Order
    Route::post('/order', [OrderController::class, 'order']);
    
    // All Order
    Route::get('/all_order', [OrderController::class, 'all_order']);
    
    // Check Order Cancel
    Route::get('/order_cancel', [OrderController::class, 'order_cancel']);
    
    // Order Cancel
    Route::post('/cancelOrder', [OrderController::class, 'cancelOrder']);
    
    // Delivery Fees
    Route::get('/deliveryFees', [OrderController::class, 'deliveryFees']);
    
    
    

});
