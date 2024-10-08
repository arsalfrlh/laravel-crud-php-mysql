<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator; //agar dapat menggunakan Paginator
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
        Paginator::useBootstrapFive(); //menggunakan booststrap
    }
}
