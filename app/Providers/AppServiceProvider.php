<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        $heroku= "https://beapis.herokuapp.com";
        $local= "http://127.0.0.1:8070";
        config(['config.heroku' => $heroku]);
        config(['config.local' => $local]);
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

    }
}
