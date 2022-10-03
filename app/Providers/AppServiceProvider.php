<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\RequestObserver;
use App\Models\Request;

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
        Request::observe(RequestObserver::class);
    }
}
