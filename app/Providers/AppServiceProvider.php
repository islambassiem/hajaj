<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Cache;
use App\Models\Category;
use App\Models\Post;

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
        $categories = Cache::rememberForever('categories', function () {
            return Category::whereNull('parent_id')->with('parent')->get();
        });
        Facades\View::composer('components.layouts.app', function ($view) use ($categories){
            $view->with('categories', $categories)
                ->with(
                    'activeCategory',
                    is_numeric(request()->segment(2))
                        ?  Category::find(Post::find(request()->segment(2))->category_id)
                        : Category::where('slug', request()->segment(2))->first()
                );
        });
    }
}
