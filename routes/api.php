<?php

use App\Http\Controllers\Api\ApiMainServiceController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group([
    'middleware' => 'auth:api'
], function(){
    Route::get('/buses',[ApiMainServiceController::class,'buses'])->name('buses');
    Route::get('/trucks',[ApiMainServiceController::class,'trucks'])->name('trucks');
    Route::post('/order_truck',[ApiMainServiceController::class,'order_truck'])->name('order_truck');
    Route::post('/order_truck_yuridiki',[ApiMainServiceController::class,'order_truck_yuridiki'])->name('order_truck_yuridiki');
    Route::post('/order_bus',[ApiMainServiceController::class,'order_bus'])->name('order_bus');
    Route::post('/order_bus_yuridiki',[ApiMainServiceController::class,'order_bus_yuridiki'])->name('order_bus_yuridiki');
    Route::post('/checkpayment',[ApiMainServiceController::class,'checkpayment'])->name('checkpayment');
});


