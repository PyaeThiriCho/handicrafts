<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Add this line
use App\Models\Category;            // Add this line

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // This makes $categories available to EVERY blade file automatically
        View::share('categories', Category::all());
    }
}