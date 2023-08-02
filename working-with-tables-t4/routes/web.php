<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\CategoryController@index');
Route::get('/category', 'App\Http\Controllers\CategoryController@index')->name('category.show');

// to fetch posts
Route::get('/{category}/posts', 'App\Http\Controllers\CategoryController@showPost')->name('category.showPost');

Route::get('/category/create', 'App\Http\Controllers\CategoryController@create')->name('category.create');

// to add data
Route::post('/category', 'App\Http\Controllers\CategoryController@add')->name('category.add');

// to edit
Route::get('/category/{category}/edit', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');

// to update
Route::put('/category/{category}/edit', 'App\Http\Controllers\CategoryController@update')->name('category.update');

// to delete
Route::delete('/category/{category}/destroy', 'App\Http\Controllers\CategoryController@destroy')->name('category.destroy');


//POSTS

Route::get('/post', 'App\Http\Controllers\postController@index')->name('post.show');

Route::get('/post/create', 'App\Http\Controllers\PostController@create')->name('post.create');

// to add data
Route::post('/post', 'App\Http\Controllers\PostController@add')->name('post.add');

// to edit
Route::get('/post/{post}/edit', 'App\Http\Controllers\PostController@edit')->name('post.edit');

// to update
Route::put('/post/{post}/edit', 'App\Http\Controllers\PostController@update')->name('post.update');

// to delete
Route::delete('/post/{post}/destroy', 'App\Http\Controllers\PostController@destroy')->name('post.destroy');