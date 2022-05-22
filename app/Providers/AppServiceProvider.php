<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['partials.sidebar', 'partials.header'], function ($view) {
            $view->with('archives', \App\Models\Post::archives());
            $view->with('all_categories', \App\Models\Category::all_categories());
        });
    }
}
