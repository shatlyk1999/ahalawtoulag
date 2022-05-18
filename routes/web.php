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
});

Route::get('/statistica', 'Front\HomeController@statistica')->name('statistica')->middleware('auth');

