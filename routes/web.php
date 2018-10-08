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

Route::get('/o', function () {
    return view('onboard');
});

Route::get('/o2', function () {
    return view('onboard2');
});


Route::get('/t/{slug}/journey', ['as' => 'tree.journey', 'uses' => 'TreeController@getJourney']);

// Route::get('/t/{slug}', ['as' => 'user.onboard', 'uses' => 'UserController@onboard']);
Route::get('/t/{slug}', ['as' => 'tree.show', 'uses' => 'TreeController@show']);
Route::post('/t/{tree}/onboard', ['as' => 'user.onboard', 'uses' => 'UserController@onboard']);
Route::post('/t/{tree}/user', ['as' => 'user.existing', 'uses' => 'UserController@getByEmail']);


Route::get('/journeys/{journey}', ['as' => 'journey.continue', 'uses' => 'JourneyController@continue']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/camera', function () {
    return view('camera');
});
Route::get('/ccamera', function () {
    return view('ccamera');
});
