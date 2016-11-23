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
    return view('welcome');
});

/* Characters */

// Show all characters
Route::get('/characters', 'CharacterController@index')->name('characters.index');

// Show individual character
Route::get('/characters/show/{id}', 'CharacterController@show')->name('characters.show');

// Show form to create a character
Route::get('/characters/create', 'CharacterController@create')->name('characters.create');

// Process form to create a character
Route::post('/characters/create', 'CharacterController@store')->name('characters.store');

// Show form to edit a character
Route::get('/characters/edit/{id}', 'CharacterController@edit')->name('characters.edit');

// Process form to edit a character
Route::put('/characters/edit/{id}', 'CharacterController@update')->name('characters.update');

// Get route to confirm deletion of character
Route::get('/characters/delete/{id}', 'CharacterController@delete')->name('characters.delete');

// Actually delete the character
Route::delete('/characters/{id}', 'CharacterController@destroy')->name('characters.destroy');

/* Relationships */

Route::get('/relationships', 'CharacterController@index')->name('relationships.index');

Route::get('/relationships/show/{id}', 'CharacterController@show')->name('relationships.show');

Route::get('/relationships/create', 'CharacterController@create')->name('relationships.create');

Route::post('/relationships/create', 'CharacterController@store')->name('relationships.store');

Route::get('/relationships/edit/{id}', 'CharacterController@edit')->name('relationships.edit');

Route::get('/relationships/edit/{id}', 'CharacterController@update')->name('relationships.update');