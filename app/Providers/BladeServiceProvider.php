<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::directive('imagePath', function ($expression) {

            return " <?php if (empty($expression)) {echo asset('storage/uploads/images/brands/default.jpg');} else {echo asset($expression);} ?>";


        });
    }
}