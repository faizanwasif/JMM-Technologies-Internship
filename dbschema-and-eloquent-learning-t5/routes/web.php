<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
$route = 'App\Http\Controllers';

Route::get('/', $route.'\CountryController@index')->name('country.show');



// insert data
Route::get('/country/insert', $route.'\CountryController@create')->name('country.create');
Route::post('/country/insert', $route.'\CountryController@add')->name('country.add');

// update data
Route::get('/country/edit/{country}', $route.'\CountryController@edit')->name('country.edit');
Route::put('/country/edit/{country}', $route.'\CountryController@update')->name('country.update');

// delete data
Route::delete('/country/{country}', $route.'\CountryController@del')->name('country.delete');


// ----------------------------------STATES------------------------------------------------------
Route::get('/state', $route.'\StateController@index')->name('state.show');

// insert data
Route::get('/state/insert', $route.'\StateController@create')->name('state.create');
Route::post('/state/insert', $route.'\StateController@add')->name('state.add');

// update data
Route::get('/state/edit/{state}', $route.'\StateController@edit')->name('state.edit');
Route::put('/state/edit/{state}', $route.'\StateController@update')->name('state.update');

// delete data
Route::delete('/state/{state}', $route.'\StateController@del')->name('state.delete');


// ----------------------------------CITIES------------------------------------------------------
Route::get('/city', $route.'\CityController@index')->name('city.show');

// insert data
Route::get('/city/insert', $route.'\CityController@create')->name('city.create');
Route::post('/city/insert', $route.'\CityController@add')->name('city.add');

// update data
Route::get('/city/edit/{city}', $route.'\CityController@edit')->name('city.edit');
Route::put('/city/edit/{city}', $route.'\CityController@update')->name('city.update');

// delete data
Route::delete('/city/{city}', $route.'\CityController@del')->name('city.delete');