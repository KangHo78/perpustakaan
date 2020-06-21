<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use URL;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // HTTPS Force
        if (App::environment() !== 'local') {
            URL::forceScheme('https');
        }
    }
}
