<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'Postcontroller');
Route::resource('comments', 'CommentController');
Route::resource('users', 'UserController');
Route::resource('likes', 'LikeController');

Route::get('login/twitter', 'Auth\LoginController@redirectToProvider')->name('login.twitter');
Route::get('login/twitter/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('posts/{post}/favorites', 'FavoriteController@store')->name('favorites');
Route::get('posts/{post}/unfavorites', 'FavoriteController@destroy')->name('unfavorites');

Route::get('posts/{post}/countfavorites', 'FavoriteController@count');
Route::get('posts/{post}/hasfavorites', 'FavoriteController@hasfavorite');
