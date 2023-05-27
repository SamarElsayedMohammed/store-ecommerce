<?php

use App\Http\Controllers\Dashboard\BrandsControlller;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\DashbordController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\SubCategoriesController;
use App\Http\Controllers\Dashboard\TagsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {

            Route::get('/home', [DashbordController::class, 'index'])->name('home');
            Route::group(['prefix' => 'settings'], function () {
                Route::get('/shipping-method/{type}', [SettingsController::class, 'shippingMethods'])->name('edit.shipping.methods');
                Route::put('/shipping-method/{id}', [SettingsController::class, 'UpdateshippingMethods'])->name('update.shipping.methods');

            });
            Route::get('/logout', [LoginController::class, 'Logout'])->name('logout');

            Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {

                Route::get('edit', [ProfileController::class, 'edit'])->name('edit');
                Route::put('update', [ProfileController::class, 'update'])->name('update');
            });
            Route::group(['prefix' => 'main_categories', 'as' => 'maincategories.'], function () {

                Route::get('/', [CategoriesController::class, 'index'])->name('index');
                Route::get('create', [CategoriesController::class, 'create'])->name('create');
                Route::post('store', [CategoriesController::class, 'store'])->name('store');
                Route::get('edit/{id}', [CategoriesController::class, 'edit'])->name('edit');
                Route::post('update/{id}', [CategoriesController::class, 'update'])->name('update');
                Route::get('delete/{id}', [CategoriesController::class, 'delete'])->name('delete');
                Route::get('changeStatus/{id}', [CategoriesController::class, 'changeStatus'])->name('changestatus');

            });
            Route::group(['prefix' => 'sub_categories', 'as' => 'subcategories.'], function () {

                Route::get('/', [SubCategoriesController::class, 'index'])->name('index');

            });

            Route::group(['prefix' => 'brands', 'as' => 'brands.'], function () {

                Route::get('/', [BrandsControlller::class, 'index'])->name('index');
                Route::get('create', [BrandsControlller::class, 'create'])->name('create');
                Route::post('store', [BrandsControlller::class, 'store'])->name('store');
                Route::get('edit/{id}', [BrandsControlller::class, 'edit'])->name('edit');
                Route::post('update/{id}', [BrandsControlller::class, 'update'])->name('update');
                Route::get('delete/{id}', [BrandsControlller::class, 'delete'])->name('delete');
                Route::get('changeStatus/{id}', [BrandsControlller::class, 'changeStatus'])->name('changestatus');

            });
            Route::group(['prefix' => 'tags', 'as' => 'tags.'], function () {

                Route::get('/', [TagsController::class, 'index'])->name('index');
                Route::get('create', [TagsController::class, 'create'])->name('create');
                Route::post('store', [TagsController::class, 'store'])->name('store');
                Route::get('edit/{id}', [TagsController::class, 'edit'])->name('edit');
                Route::post('update/{id}', [TagsController::class, 'update'])->name('update');
                Route::get('delete/{id}', [TagsController::class, 'delete'])->name('delete');
                Route::get('changeStatus/{id}', [TagsController::class, 'changeStatus'])->name('changestatus');

            });
        });

        Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'guest:admin',], function () {

            Route::get('/login', [LoginController::class, 'index'])->name('login');
            Route::post('/login', [LoginController::class, 'login'])->name('store.login');



        });
    }
);