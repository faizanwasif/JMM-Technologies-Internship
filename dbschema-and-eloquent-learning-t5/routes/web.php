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

Route::get('/', function () {
    return view('country.show');
});

Route::get('/country', $route.'\CountryController@index')->name('country.show');

// insert data
Route::get('/country/insert', $route.'\CountryController@create')->name('country.create');
Route::post('/country/insert', $route.'\CountryController@add')->name('country.add');

// update data
Route::get('/country/edit/{country}', $route.'\CountryController@edit')->name('country.edit');
Route::put('/country/edit/{country}', $route.'\CountryController@update')->name('country.update');

// delete data
Route::delete('/country/{country}', $route.'\CountryController@del')->name('country.delete');
