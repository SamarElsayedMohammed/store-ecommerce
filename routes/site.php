<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PaymentController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Controllers\Front\VerificationCodeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register site routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "site" middleware group. Now create something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::group(['as' => 'users.', 'middleware' => 'guest'], function () {

            Route::get('/login', [AuthController::class, 'login'])->name('login');
            Route::post('/check-login', [AuthController::class, 'checkLogin'])->name('check.login');
            Route::get('register', [AuthController::class, 'register'])->name('register');
            Route::post('/stor-user', [AuthController::class, 'storUser'])->name('register.store');


        });
        Route::group(['as' => 'users.', 'middleware' => 'auth'], function () {
            Route::post('verify-user/', [VerificationCodeController::class, 'verify'])->name('verify-user');
            Route::get('verify', [VerificationCodeController::class, 'getVerifyPage'])->name('get.verification.form');
        });

        Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:web')->name('users.logout');
        Route::get('/home', [HomeController::class, 'index'])->name('front.home');
        Route::group(['middleware' => 'auth'], function () {
            Route::post('wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
            Route::post('wishlist/delete', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
            Route::get('wishlist/products', [WishlistController::class, 'index'])->name('wishlist.products.index');
        });

        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            Route::get('/{slug}', [ProductController::class, 'index'])->name('index');
            Route::get('single-product/{slug}', [ProductController::class, 'productsDetails'])->name('details');
            Route::get('/all/search', [ProductController::class, 'ProductSearch'])->name('Search');

        });
        Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
            Route::get('/', [CartController::class, 'index'])->name('index');
            Route::post('/store', [CartController::class, 'store'])->name('store');
            Route::get('payment/{amount}', [PaymentController::class, 'getPayments'])->name('payment');
            Route::post('payment', [PaymentController::class, 'processPayment'])->name('payment.process');
            // Route::get('/all/search', [CartController::class, 'ProductSearch'])->name('Search');
    
        });

    }
);