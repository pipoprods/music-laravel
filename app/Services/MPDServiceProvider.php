<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;

// use App\Providers\MPDService;

class MPDServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('MPDService', function ($app) { return new MPDService(); });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
