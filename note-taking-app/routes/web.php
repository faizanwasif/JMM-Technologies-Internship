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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -------------------------------User----------------------------------------------------------

// -------------------------------Tag------------------------------------------------------
//View List Page
Route::get('/tags', $route.'\TagController@index')->name('view-tags')->middleware('auth');

// View Add Page
Route::get('/tags/add', $route.'\TagController@create')->name('create-tags')->middleware('auth');
Route::post('/tags/add', $route.'\TagController@add')->name('add-tags')->middleware('auth');

// Delete 
Route::delete('/tag/{tag}', $route.'\TagController@del')->name('tag.remove')->middleware('auth');

// update data
Route::get('/tag/edit/{tag}', $route.'\TagController@edit')->name('tag.edit');
Route::put('/tag/edit/{tag}', $route.'\TagController@update')->name('tag.update');

// filter data
Route::get('/tag/search', $route.'\TagController@search')->name('tag.search');

// -------------------------------Note----------------------------------------------------------

Route::get('/note/view/{note}', $route.'\NoteController@index')->name('note.view')->middleware('auth');

// View Add Page
Route::get('/notes/add', $route.'\NoteController@create')->name('create-notes')->middleware('auth');
Route::post('/notes/add', $route.'\NoteController@add')->name('add-notes')->middleware('auth');

// Delete
Route::delete('/notes/{note}', $route.'\NoteController@del')->name('note.remove')->middleware('auth');

// update data
Route::get('/note/edit/{note}', $route.'\NoteController@edit')->name('note.edit');
Route::put('/note/edit/{note}', $route.'\NoteController@update')->name('note.update');

// filter data
Route::get('/note/search', $route.'\NoteController@search')->name('note.search');
