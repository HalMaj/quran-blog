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

Route::get('/', 'QuranController@index');

Route::resource('quran', 'QuranController');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index');

Route::get('admin/post/{id}/accept', 'HomeController@postAccept')->name('admin.post.accept');

//Route::get('blog/public', 'HomeController@index')->name('blog.public');
