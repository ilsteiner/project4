<?php

namespace CharDB\Providers;

use Illuminate\Support\ServiceProvider;
use CharDB\Character;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.navigation', function($view){
            $characters = Character::orderBy('last_name')->orderBy('first_name')->get();
            $view->with('characters', $characters);
        });

        view()->composer('characters.create', function($view){
            $characters = Character::orderBy('last_name')->orderBy('first_name')->get();
            $view->with('characters', $characters);
        });

        view()->composer('characters.create', function($view){
            $characters = Character::orderBy('last_name')->orderBy('first_name')->get();
            $view->with('characters', $characters);
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
