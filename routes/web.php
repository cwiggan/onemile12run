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

Route::get('/', 'PageController@index')->name('home');
//Route::get('sign-up', 'PageController@signup');
//Route::get('contact', 'PageController@contact');

//Route::name('admin')->group(function () {
Route::prefix('race')->group(function () {
    Route::get('/all', 'RacesController@index');
    Route::get('new', 'RacesController@create')->middleware('auth');
    Route::get('edit/{id}','RacesController@edit')->middleware('auth');
    Route::post('create', 'RacesController@store')->middleware('auth');
    Route::post('update/{id}', 'RacesController@update')->middleware('auth');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/results', 'ResultsController@index');
    Route::get('/results/add', 'ResultsController@add');
    Route::post('/results/create', 'ResultsController@create');
    Route::get('/results/remove/{year}', 'ResultsController@remove');
});
//});
Route::post('saveform', 'PageController@register');
Route::get('getresults/{year}', 'PageController@getResults');
Auth::routes(['register' => false]);
Route::get('/{catchall?}', 'PageController@index')->where('catchall', '^(?!race).*$')->name('administration');
//Route::get('/home', 'HomeController@index')->name('home');
