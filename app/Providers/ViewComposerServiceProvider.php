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

            // I load the sexes here because the nav always needs them
            $sexes = DB::table('sexes')->select('id', 'icon')->get();
            $sexMap = array();
            foreach ($sexes as $sex) {
                $sexMap[$sex->id] = $sex->icon;
            }

            return $view->with('characters', $characters)->with('sexes', $sexes);
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
