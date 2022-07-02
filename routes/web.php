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

Route::get('/', 'ProductController@index');

Route::get('mypage', 'UserController@mypage')->name('mypage');
Route::get('mypage/edit', 'UserController@edit')->name('mypage.edit');
Route::put('mypage', 'UserController@update')->name('mypage.update');

Route::resource('products', 'ProductController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
