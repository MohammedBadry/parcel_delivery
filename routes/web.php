<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Sender\Orders as SenderOrders;
use App\Http\Controllers\Biker\Orders as BikerOrders;
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
  return view('welcome');
});


Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {

  Route::get('dashboard', [Dashboard::class, 'index'])->name('dashoard.index');

  Route::group(['prefix' => 'sender', 'middleware' => 'sender', 'as' => 'sender.'], function () {
    Route::get('orders', [SenderOrders::class, 'index'])->name('orders.index');
    Route::get('orders/create', [SenderOrders::class, 'create'])->name('orders.create');
    Route::post('orders', [SenderOrders::class, 'store'])->name('orders.store');
  });

  Route::group(['prefix' => 'biker', 'middleware' => 'biker', 'as' => 'biker.'], function () {
    Route::get('orders/suggested', [BikerOrders::class, 'suggested'])->name('orders.suggested');
    Route::get('orders', [BikerOrders::class, 'index'])->name('orders.index');
    Route::patch('orders/{id}/pickup', [BikerOrders::class, 'pickupOrder'])->name('orders.pickup');
    Route::patch('orders/{id}/change-status', [BikerOrders::class, 'changeStatus'])->name('orders.change-status');
  });
});
