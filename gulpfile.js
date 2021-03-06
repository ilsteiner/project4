const elixir = require('laravel-elixir');

//require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix
    	.copy('node_modules/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css',
       		'resources/assets/sass/_switch.scss')
    	.sass(
		    ['CharDB.scss'],
		    'public/css/CharDB.css'
		    )
       .webpack('CharDB.js')
       .scripts('custom.js')
       .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/fonts/bootstrap/')
       .copy('node_modules/font-awesome/fonts/','public/fonts/font-awesome')
});
