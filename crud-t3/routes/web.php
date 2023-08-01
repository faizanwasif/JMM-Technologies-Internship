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

Route::get('/', 'App\Http\Controllers\BookController@index');

Route::get('/book', 'App\Http\Controllers\BookController@index')->name('book.show');
Route::get('/book/create', 'App\Http\Controllers\BookController@create')->name('book.create');
Route::post('/book', 'App\Http\Controllers\BookController@store')->name('book.store');
Route::get('/book/{book}/edit', 'App\Http\Controllers\BookController@edit')->name('book.edit');

// to edit or update data in db use post
Route::put('/book/{book}/update', 'App\Http\Controllers\BookController@update')->name('book.update');

// deletion
Route::delete('/book/{book}/destroy', 'App\Http\Controllers\BookController@destroy')->name('book.destroy');
