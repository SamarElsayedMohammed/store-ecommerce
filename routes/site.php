<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

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
Route::get('/home', function () {
    // $catts = Category::with('childs')->parent()->get();
    // return $catts;
    return view('front.home');
});