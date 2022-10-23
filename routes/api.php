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

Route::get('/buses',[ApiMainServiceController::class,'buses'])->name('buses');
Route::get('/trucks',[ApiMainServiceController::class,'trucks'])->name('trucks');
Route::post('/pay',[ApiMainServiceController::class,'pay'])->name('pay');