<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Cheat;
use App\Models\CheatContent;
use App\Models\CheatGroup;
use App\Models\CheatSheet;
use App\Models\Note;
use App\Models\Tag;
use App\Observers\CategoryObserver;
use App\Observers\CheatContentObserver;
use App\Observers\CheatGroupObserver;
use App\Observers\CheatObserver;
use App\Observers\CheatSheetObserver;
use App\Observers\NoteObserver;
use App\Observers\TagObserver;
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
        CheatGroup::observe(CheatGroupObserver::class);
        Cheat::observe(CheatObserver::class);
        CheatContent::observe(CheatContentObserver::class);
        Note::observe(NoteObserver::class);
        Tag::observe(TagObserver::class);
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
