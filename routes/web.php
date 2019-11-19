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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/events', 'EventController@index')->name('event.index');
Route::post('/events', 'EventController@store')->name('event.store');
Route::get('/events/create', 'EventController@create')->name('event.create');
Route::get('/events/{event}/edit','EventController@edit')->name('event.edit');
Route::post('/events/{event}/modal/update','EventController@updateModal')->name('event.update-modal');
Route::post('/events/{event}/update','EventController@update')->name('event.update');
Route::DELETE('/events/{event}','EventController@destroy')->name('event.delete');

Route::get('/competition/create','CompetitionController@create')->name('competition.create');
Route::post('/competition','CompetitionController@store')->name('competition.store');
