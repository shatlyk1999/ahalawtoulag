<?php

use Illuminate\Support\Facades\Route;
use App\Http\Contollers\UserController;
use App\Http\Contollers\Front\HomeController;

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

Auth::routes();
Route::get('rss', 'RssFeedController@rss');
Route::group([
    'middleware' => 'metrica'
], function(){
    Route::get('lang/{lang}', [App\Http\Controllers\LanguageController::class,'switchLang'])->name('lang.switch');
    Route::get('/', 'Front\HomeController@index')->name('home');
    Route::get('/news', 'Front\HomeController@news')->name('news');
    Route::get('/news/{id}', 'Front\HomeController@newsView')->name('newsView');
    Route::get('/about', 'Front\HomeController@about')->name('about');
    Route::get('/services', 'Front\HomeController@services')->name('services');
    Route::get('/normative', 'Front\HomeController@normative')->name('normative');
    Route::post('/contact', 'Front\HomeController@contactpost')->name('contact');
    Route::get('/contactpage', 'Front\HomeController@contact')->name('contactpage');
    Route::get('/order', 'Front\OrderController@index')->name('order');
});

Route::get('/statistica', 'Front\HomeController@statistica')->name('statistica')->middleware('auth');

Route::get('/choose', 'Front\OrderController@choose')->name('choose');
Route::get('/chekout', 'Front\OrderController@chekout')->name('chekout');
Route::post('/chekout', 'Front\OrderController@chekout')->name('chekout');
Route::get('/awto', 'Front\OrderController@awto')->name('awto');
Route::post('/awto', 'Front\OrderController@awto')->name('awto');
Route::get('/legal', 'Front\OrderController@legal')->name('legal');
Route::post('/legal', 'Front\OrderController@legal')->name('legal');
Route::get('/budget', 'Front\OrderController@budget')->name('budget');
Route::post('/budget', 'Front\OrderController@budget')->name('budget');
Route::get('/weight', 'Front\OrderController@weight')->name('weight');
Route::post('/weight', 'Front\OrderController@weight')->name('weight');
Route::get('/truck', 'Front\OrderController@truck')->name('truck');
Route::post('/truck', 'Front\OrderController@truck')->name('truck');
Route::get('/order_bus', 'Front\OrderController@order_bus')->name('order_bus');
Route::post('/order_bus', 'Front\OrderController@order_bus')->name('order_bus');
Route::get('/order_bus_yuridiki', 'Front\OrderController@order_bus_yuridiki')->name('order_bus_yuridiki');
Route::post('/order_bus_yuridiki', 'Front\OrderController@order_bus_yuridiki')->name('order_bus_yuridiki');
Route::get('/approve', 'Front\OrderController@approve')->name('approve');
Route::post('/approve', 'Front\OrderController@approve')->name('approve');
Route::get('/approveyuk', 'Front\OrderController@approveyuk')->name('approveyuk');
Route::post('/approveyuk', 'Front\OrderController@approveyuk')->name('approveyuk');
Route::get('/order_truck', 'Front\OrderController@order_truck')->name('order_truck');
Route::post('/order_truck', 'Front\OrderController@order_truck')->name('order_truck');
Route::get('/order_truck_yuridiki', 'Front\OrderController@order_truck_yuridiki')->name('order_truck_yuridiki');
Route::post('/order_truck_yuridiki', 'Front\OrderController@order_truck_yuridiki')->name('order_truck_yuridiki');
Route::get('/physical', 'Front\OrderController@physical')->name('physical');
Route::get('/payment', 'Front\PaymentController@payment')->name('payment');
