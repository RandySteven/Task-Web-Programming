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

Route::get('/', 'PostController@index')->name('post.index');
Route::get('/create-post', 'PostController@create')->name('post.create');
Route::post('/create-post', 'PostController@store')->name('post.store');
Route::get('/post/{post:slug}', 'PostController@show')->name('post.show');
Route::get('/post-edit/{post:slug}', 'PostController@edit')->name('post.edit');
