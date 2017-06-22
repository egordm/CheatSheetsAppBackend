<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CheatSheet;
use App\Observers\CategoryObserver;
use App\Observers\CheatSheetObserver;
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
        Category::observe(CategoryObserver::class);
        CheatSheet::observe(CheatSheetObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
