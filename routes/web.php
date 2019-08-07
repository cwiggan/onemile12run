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

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', 'SignUpController@index');
    Route::get('/results', 'ResultsController@index');
    Route::get('/results/add', 'ResultsController@add');
    Route::post('/results/create', 'ResultsController@create');
    Route::get('/results/remove/{year}', 'ResultsController@remove');
    Route::get('/signups', 'SignUpController@index');
    Route::get('/signup/{id}/edit', 'SignUpController@edit');
    Route::get('/signup/{id}', 'SignUpController@show');
    Route::get('/signups/t-shirts', 'SignUpController@shirts');
    Route::get('/signups/down', 'SignUpController@export');
    Route::prefix('race')->group(function () {
        Route::get('/all', 'RacesController@index');
        Route::get('new', 'RacesController@create')->middleware('auth');
        Route::get('edit/{id}','RacesController@edit')->middleware('auth');
        Route::post('create', 'RacesController@store')->middleware('auth');
        Route::post('update/{id}', 'RacesController@update')->middleware('auth');
    });
    Route::resource('contacts', 'ContactController')->only([
        'index', 'show', 'update'
    ]);
    Route::resource('volunteers', 'VolunteersController')->only([
        'index', 'show'
    ]);
});
//});
Route::post('saveform', 'PageController@register');
Route::post('emailForm', 'PageController@contact');
Route::post('volunteerAdd', 'PageController@volunteer');
Route::get('getresults/{year?}', 'PageController@getResults');
Route::get('countSignup', 'PageController@countSignUp');
Route::post('rollcalling', 'PageController@stripeCall');
Auth::routes(['register' => false]);
Route::get('/{catchall?}', 'PageController@index')->where('catchall', '^(?!race).*$')->name('administration');
//Route::get('/home', 'HomeController@index')->name('home');
