<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\Register;
use App\Http\Controllers\API\Auth\Login;
use App\Http\Controllers\API\Sender\Orders as SenderOrders;
use App\Http\Controllers\API\Biker\Orders as BikerOrders;

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

Route::group(['middleware' => 'guest'], function () {
    Route::post("login", [Login::class, 'login']);
    Route::post("register", [Register::class, 'register']);
});
     
Route::middleware('auth:sanctum')->group( function () {
    Route::group(['prefix' => 'sender', 'middleware' => 'sender'], function () {
        Route::get("orders", [SenderOrders::class, 'index']);
        Route::post("orders", [SenderOrders::class, 'store']);
    });
    Route::group(['prefix' => 'biker', 'middleware' => 'biker'], function () {
        Route::get("orders", [BikerOrders::class, 'index']);
        Route::get("suggested-orders", [BikerOrders::class, 'suggested']);
        Route::patch("orders/{id}/pickup", [BikerOrders::class, 'pickupOrder']);
        Route::patch("orders/{id}/change-status", [BikerOrders::class, 'changeStatus']);
    });
});
