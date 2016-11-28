<?php

namespace CharDB\Providers;

use Illuminate\Support\ServiceProvider;
use CharDB\Character;

class CachingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Character::saved(function($character) {
            Cache::put('characters',Character::all(),20);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
