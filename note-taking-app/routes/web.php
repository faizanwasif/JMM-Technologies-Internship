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

// View Edit Page
Route::get('/notes/edit', $route.'\TagController@create')->name('create-tags')->middleware('auth');
Route::post('/notes/edit', $route.'\TagController@add')->name('add-tags')->middleware('auth');

// -------------------------------Note----------------------------------------------------------
// View Edit Page
Route::get('/notes/edit', $route.'\NoteController@create')->name('create-notes')->middleware('auth');
Route::post('/notes/edit', $route.'\NoteController@add')->name('add-notes')->middleware('auth');