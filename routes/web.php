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

//rotte pubbliche

Route::get('/', 'PageController@index');
Route::get('/blog', 'FrontController@index')->name('blog.index');
Route::get('/blog/{slug}', 'FrontController@show')->name('posts.show');
Route::get('/blog/category/{slug}', 'CategoryController@show')->name('categories.show');
Route::get('/api-posts', 'PageController@apiPosts')->name('posts.api');

//rotte autentificazione
Auth::routes();

//rotte area dmin
Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function() {

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');

});

