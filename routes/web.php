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

Route::get('/', 'IndexController')->name('app.index');

Route::get('/lorem/', 'LoremController@create')->name('lorem.create');

Route::post('/lorem/', 'LoremController@store')->name('lorem.store');



Route::get('/characters', 'CharacterController@index')->name('characters.index');
Route::get('/characters/show/{name}', 'CharacterController@show')->name('characters.show');
Route::get('/characters/create', 'CharacterController@create')->name('characters.create');
Route::post('/characters/create', 'CharacterController@store')->name('characters.store');
Route::get('/characters/edit/{name}', 'CharacterController@edit')->name('characters.edit');
Route::get('/characters/edit/{name}', 'CharacterController@update')->name('characters.update');

Route::get('/relationships', 'CharacterController@index')->name('relationships.index');
Route::get('/relationships/show/{id}', 'CharacterController@show')->name('relationships.show');
Route::get('/relationships/create', 'CharacterController@create')->name('relationships.create');
Route::post('/relationships/create', 'CharacterController@store')->name('relationships.store');
Route::get('/relationships/edit/{id}', 'CharacterController@edit')->name('relationships.edit');
Route::get('/relationships/edit/{id}', 'CharacterController@update')->name('relationships.update');