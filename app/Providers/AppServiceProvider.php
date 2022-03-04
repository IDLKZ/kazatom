<?php

namespace App\Providers;

use App\Category;
use App\User;
use Illuminate\Support\Facades\Blade;
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
        view()->composer('layouts.header', function($view){
            $view->with('categories', Category::all());
        });
        view()->composer('instructor.navbar', function($view){
            $view->with('profile', User::with('courses.videos')->where('id', auth()->id())->first());
        });

    }
}
