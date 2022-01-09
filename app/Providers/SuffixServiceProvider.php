<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SuffixServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Suffix','App\Services\Suffix');
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
