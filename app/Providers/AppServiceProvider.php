<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Components\button\ButtonCrud;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**ss
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('button-crud', ButtonCrud::class);
    }
}
