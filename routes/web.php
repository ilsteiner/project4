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
Route::get('/characters/create', 'CharacterController@create')->name('characters.create')->middleware('auth');

// Process form to create a character
Route::put('/characters/create', 'CharacterController@store')->name('characters.store');

// Show form to edit a character
Route::get('/characters/edit/{id}', 'CharacterController@edit')->name('characters.edit');

// Process form to edit a character
Route::put('/characters/edit/{id}', 'CharacterController@update')->name('characters.update');

// Get route to confirm deletion of character
Route::get('/characters/delete/{id}', 'CharacterController@delete')->name('characters.delete');

// Actually delete the character
Route::delete('/characters/{id}', 'CharacterController@destroy')->name('characters.destroy');

/*Relationship routes*/
Route::get('/relationships/show/{id}', 'RelationshipController@show')->name('relationships.show');

Route::get('/relationships/create', 'RelationshipController@create')->name('relationships.create');

Route::put('/relationships/create', 'RelationshipController@store')->name('relationships.store');

Route::get('/relationships/edit/{id}', 'RelationshipController@edit')->name('relationships.edit');

Route::put('/relationships/edit/{id}', 'RelationshipController@update')->name('relationships.update');
Route::get('/relationships/delete/{id}', 'RelationshipController@delete')->name('relationships.delete');
Route::delete('/relationships/{id}', 'RelationshipController@destroy')->name('relationships.destroy');

Route::get('logout',array('uses' => 'HomeController@logout'));
// Route::get('login',array('uses' => 'CharacterController@index'));

Route::group(['middleware' => ['web']], function() {

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
