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

Route::get('/', [App\Http\Controllers\ContactListController::class, 'index'])->name('contact-list')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\ContactListController::class, 'index'])->name('contact-list')->middleware('auth');

// CRUD Contact
Route::get('/contact/create', [App\Http\Controllers\ContactController::class, 'create'])->name('contact-create')->middleware('auth');
Route::post('/contact/create', [App\Http\Controllers\ContactController::class, 'store'])->name('contact-store')->middleware('auth');

Route::get('/contact/view/{contact}', [App\Http\Controllers\ContactController::class, 'index'])->name('contact-view')->middleware('auth');

// CRUD History
Route::get('/history', $route . '\HistoryController@index')->name('history')->middleware('auth');