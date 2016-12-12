<?php

namespace CharDB\Providers;

use Illuminate\Support\ServiceProvider;
use CharDB\Character;
use CharDB\Relationship;
use DB;

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
            return $view->with('characters', $characters);
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
