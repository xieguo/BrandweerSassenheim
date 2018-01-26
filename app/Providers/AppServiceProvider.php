<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fix: https://github.com/laravel/docs/blob/5.4/migrations.md#user-content-index-lengths--mysql--mariadb
        Schema::defaultStringLength(191);
    }
}
