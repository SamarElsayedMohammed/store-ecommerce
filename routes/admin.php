<?php

use App\Http\Controllers\Dashboard\DashbordController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\SettingsController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){
    Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {

        Route::get('/home', [DashbordController::class, 'index'])->name('home');
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/shipping-method/{type}', [SettingsController::class, 'shippingMethods'])->name('edit.shipping.methods');
            Route::put('/shipping-method/{id}', [SettingsController::class, 'UpdateshippingMethods'])->name('update.shipping.methods');

        });


    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'guest:admin',], function () {

        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('store.login');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


    });
});