<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $view->with([
                'count_posts' => Post::count(),
                'first_post_date' => Post::count() ? date('d.m.Y', strtotime(Post::orderBy('id')->first()->created_at)) : '',
                'last_post_date' => Post::count() ? date('d.m.Y', strtotime(Post::orderBy('id', 'desc')->first()->created_at)) : '',
                'first_author' => Post::count() ? Post::orderBy('id')->first()->user->name : '',
                'last_author' => Post::count() ? Post::orderBy('id', 'desc')->first()->user->name : '',
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
