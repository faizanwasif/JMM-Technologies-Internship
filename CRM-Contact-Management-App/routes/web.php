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

Route::get('/', [App\Http\Controllers\ContactListController::class, 'index'])->name('contact-list')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\ContactListController::class, 'index'])->name('contact-list')->middleware('auth');
