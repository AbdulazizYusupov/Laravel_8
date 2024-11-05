<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
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
        View::composer('Layouts.mainPage', function ($view) {
            $view->with('datas', Category::orderBy('tr', 'asc')->get());
        });
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
