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

Route::middleware('auth')->group(function(){
    Route::get('/', 'PostController@index')->name('post.index')->withoutMiddleware('auth');
    Route::get('/create-post', 'PostController@create')->name('post.create');
    Route::post('/create-post', 'PostController@store')->name('post.store');
    Route::get('/post/{post:slug}', 'PostController@show')->name('post.show')->withoutMiddleware('auth');
    Route::get('/post-edit/{post:slug}', 'PostController@edit')->name('post.edit');
    Route::patch('/post-update/{post:slug}', 'PostController@update')->name('post.update');
    Route::delete('/post-delete/{post:slug}', 'PostController@destroy')->name('post.delete');
});
Route::get('/post-search', 'SearchController@show')->name('search');
Route::post('/store-comment', 'CommentController@store')->name('store.comment');
Route::post('/store-reply', 'CommentController@replies')->name('store.reply');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
