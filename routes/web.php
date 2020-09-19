<?php

use Illuminate\Support\Facades\Auth;
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

// Auth::routes(['verify'=>true]);
Route::middleware(['auth'])->group(function(){
    //post
    Route::get('/', 'PostController@index')->name('post.index')->withoutMiddleware(['auth']);
    Route::get('/create-post', 'PostController@create')->name('post.create');
    Route::post('/create-post', 'PostController@store')->name('post.store');
    Route::get('/post/{post:slug}', 'PostController@show')->name('post.show')->withoutMiddleware(['auth']);
    Route::get('/post-edit/{post:slug}', 'PostController@edit')->name('post.edit');
    Route::patch('/post-update/{post:slug}', 'PostController@update')->name('post.update');
    Route::delete('/post-delete/{post:slug}', 'PostController@destroy')->name('post.delete');

    //mail
    Route::post('/store-email', 'PostController@mail')->name('post.email');
});
//See user
Route::get('/user/{user}', 'UserController@show')->name('user');

Auth::routes();

//admin dashboard
Route::middleware(['role:admin', 'auth'])->group(function(){
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
});

//Search
Route::get('/post-search', 'SearchController@show')->name('search');

//Category
Route::get('/category/{category:slug}', 'CategoryController@show')->name('category');

//Comment
Route::post('/store-comment', 'CommentController@store')->name('store.comment');
Route::post('/store-reply', 'CommentController@replies')->name('store.reply');
Route::delete('/delete-comment/{comment}', 'CommentController@delete')->name('comment.delete');

//File
Route::post('/store-file/', 'FileController@store')->name('store.file');

// Route::get('/see-email', 'PostController@viewMail')->name('view.email');

Route::get('/home', 'HomeController@index')->name('home');
