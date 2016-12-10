<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/characters');
});

// Show all characters
Route::get('/characters', 'CharacterController@index')->name('characters.index');

// Show individual character
Route::get('/characters/show/{id}', 'CharacterController@show')->name('characters.show');

// Show form to create a character
Route::get('/characters/create', 'CharacterController@create')->name('characters.create')
	->middleware('auth');

// Process form to create a character
Route::put('/characters/create', 'CharacterController@store')->name('characters.store')
	->middleware('auth');

// Show form to edit a character
Route::get('/characters/edit/{id}', 'CharacterController@edit')->name('characters.edit')
	->middleware('auth');

// Process form to edit a character
Route::put('/characters/edit/{id}', 'CharacterController@update')->name('characters.update')
	->middleware('auth');

// Get route to confirm deletion of character
Route::get('/characters/delete/{id}', 'CharacterController@delete')->name('characters.delete')
	->middleware('auth');

// Actually delete the character
Route::delete('/characters/{id}', 'CharacterController@destroy')->name('characters.destroy')
	->middleware('auth');

/*Relationship routes*/
Route::get('/relationships/show/{id}', 'RelationshipController@show')->name('relationships.show');

Route::get('/relationships/create', 'RelationshipController@create')->name('relationships.create')
	->middleware('auth');

Route::put('/relationships/create', 'RelationshipController@store')->name('relationships.store')
	->middleware('auth');

Route::get('/relationships/edit/{id}', 'RelationshipController@edit')->name('relationships.edit')
	->middleware('auth');

Route::put('/relationships/edit/{id}', 'RelationshipController@update')->name('relationships.update')
	->middleware('auth');

Route::get('/relationships/delete/{id}', 'RelationshipController@delete')->name('relationships.delete')
	->middleware('auth');
Route::delete('/relationships/{id}', 'RelationshipController@destroy')->name('relationships.destroy')
	->middleware('auth');

Route::get('logout',array('uses' => 'HomeController@logout'));
// Route::get('login',array('uses' => 'CharacterController@index'));

Auth::Routes();

/*Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    //Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});

Route::get('/home', 'HomeController@index');
*/