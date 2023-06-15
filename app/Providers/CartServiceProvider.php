<?php

namespace App\Providers;

use App\Interfaces\CartInterface;
use App\Repositories\CartRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CookieCartRepository;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CartInterface::class, function () {
            return new CookieCartRepository();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}