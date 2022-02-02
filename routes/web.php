<?php

use Illuminate\Support\Facades\Route;

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


//Route::get('/Airplanes/index', 'AirplaneController@index')->name('Airplanes.index');
//Route::get('/Airplanes/about', 'AirplaneController@about')->name('Airplanes.about');

Route::get('/', function () { 
    return view('welcome'); 
});
Route::get('/airplanes','AirplanesController@index')->name('airplanes.index');
Route::get('/airplanes/create','AirplanesController@create')->name('airplanes.create');
Route::post('/airplanes','AirplanesController@store')->name('airplanes.store'); // making a post request
Route::get('/airplanes/{id}','AirplanesController@show')->name('airplanes.show');
Route::get('/airplanes/{id}/edit','AirplanesController@edit')->name('airplanes.edit');
Route::put('/airplanes/{id}','AirplanesController@update')->name('airplanes.update'); // making a put request
Route::delete('/airplanes/{id}','AirplanesController@destroy')->name('airplanes.destroy'); // making a delete request
//Route::get('/airplanes/{id}/bid','AirplanesController@bid')->name('airplanes.bid');

Route::get('/bids','BidsController@index')->name('bids.index');
//Route::get('/bids/create','BidsController@create')->name('bids.create');
Route::get('/bids/create/{airplaneID}','BidsController@create')->name('bids.create');
Route::post('/bids','BidsController@store')->name('bids.store'); // making a post request
Route::get('/bids/{id}','BidsController@show')->name('bids.show');
//Route::get('/bids/{id}/{airplaneID}','BidsController@show')->name('bids.show');
Route::get('/bids/{id}/edit','BidsController@edit')->name('bids.edit');
Route::put('/bids/{id}','BidsController@update')->name('bids.update'); // making a put request
Route::delete('/bids/{id}','BidsController@destroy')->name('bids.destroy'); // making a delete request

Route::post('/storeAirplane','AirplaneController@storeAirplane');
Route::get('/getAirplanes', 'AirplaneController@getAirplanes');
Route::post('/deleteAirplane/{id}', 'AirplaneController@deleteAirplane');
Route::post('/editAirplane/{id}', 'AirplaneController@editAirplane');



//Route::resource('/cruds', 'CrudsController');
//Route::resource('/Airplanes', 'AirplanesController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

