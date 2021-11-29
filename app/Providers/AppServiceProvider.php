<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }

        view()->composer('*', function ($view) {
            $user = \Auth::user();
    
            $tags = array(
                'アニマル',
                'キャラクター',
                'シティ',
                '建物',
                '乗り物',
                'フィギュア',
                'その他'
            );

            $view->with('user', $user)->with('tags', $tags);
        });
    }
}
