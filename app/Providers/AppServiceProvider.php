<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('superadmin', fn() => auth()->check() && auth()->user()->role->name === 'superadmin');
        Blade::if('adminevent', fn() => auth()->check() && auth()->user()->role->name === 'admin-event');
        Blade::if('adminteam', fn() => auth()->check() && auth()->user()->role->name === 'admin-team');
    }
}
