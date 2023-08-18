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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Auth::routes();

// -------------------------------Contact------------------------------------------------------
Route::get('/home', [App\Http\Controllers\HomeController::class, 'showList'])->name('contact-list')->middleware('auth');

// CRUD Contact
Route::get('/contact/create', [App\Http\Controllers\ContactController::class, 'create'])->name('contact-create')->middleware('auth');
Route::post('/contact/create', [App\Http\Controllers\ContactController::class, 'store'])->name('contact-store')->middleware('auth');
Route::get('/contact/view/{contact}', [App\Http\Controllers\ContactController::class, 'index'])->name('contact-view')->middleware('auth');

// Delete 
Route::delete('/contact/{contact}', $route.'\ContactController@del')->name('contact-remove')->middleware('auth');

// update data
Route::get('/contact/edit/{contact}', $route.'\ContactController@edit')->name('contact-edit');
Route::put('/contact/edit/{contact}', $route.'\ContactController@update')->name('contact-update');


// filter contact
Route::get('/contact/search', $route.'\ContactListController@search')->name('contact-search');
Route::get('/contact/{contact}', $route.'\ContactListController@showContact')->name('contact-showNote');




// CRUD History
// Route::get('/home', $route . 'ContactController@showHistory')->name('history')->middleware('auth');

// -------------------------------Tag------------------------------------------------------
Route::get('/tags', $route.'\HomeController@showTag')->name('view-tags')->middleware('auth');

// View Add Page
Route::get('/tags/add', $route.'\TagController@create')->name('create-tags')->middleware('auth');
Route::post('/tags/add', $route.'\TagController@add')->name('add-tags')->middleware('auth');

// Delete 
Route::delete('/tag/{tag}', $route.'\TagController@del')->name('tag-remove')->middleware('auth');

// update data
Route::get('/tag/edit/{tag}', $route.'\TagController@edit')->name('tag-edit');
Route::put('/tag/edit/{tag}', $route.'\TagController@update')->name('tag-update');

// filter data
Route::get('/tag/search', $route.'\TagController@search')->name('tag-search');

Route::get('/tag/{tag}', $route.'\TagController@showNote')->name('tag.showNote');