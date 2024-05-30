<?php

namespace App\Providers;

use App\Http\Services\CinemaService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }


    /**
     * Bootstrap any application services.
     */
    protected $namespace = 'App\Http\Controllers';
    public function boot(): void
    {
        Paginator::defaultView('pagination::bootstrap-4');
    }

}
