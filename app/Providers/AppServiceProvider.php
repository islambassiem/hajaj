<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
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
        if (app()->runningInConsole() || !Schema::hasTable('categories') || !Schema::hasTable('posts')) {
            return;
        }

        $categories = Cache::rememberForever('categories', function () {
            return Category::whereNull('parent_id')->with('parent')->get();
        });

        $activeCategory = is_numeric(request()->segment(2))
            ?  Category::find(Post::find(request()->segment(2))->category_id)
            : Category::where('slug', request()->segment(2))->first();

        Facades\View::composer('components.layouts.app', function ($view) use ($categories, $activeCategory) {
            $view->with('categories', $categories)
                ->with('activeCategory',$activeCategory);
        });

        Facades\View::composer('livewire.category', function ($view) use ($categories, $activeCategory) {
            $view->with('categories', $categories)
                ->with('activeCategory',$activeCategory);
        });
    }
}
