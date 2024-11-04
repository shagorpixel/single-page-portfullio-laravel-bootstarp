<?php

namespace App\Providers;

use App\Models\ServiceCategory;
use Illuminate\Support\facades\Schema;
use Illuminate\Support\Facades\View;
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
        $categories = ServiceCategory::all();
        View::share('categories',$categories);
    }
}
