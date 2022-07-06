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
Route::get('mypage/favorite', 'UserController@favorite')->name('mypage.favorite');
Route::get('mypage/unfavorite', 'UserController@unfavorite')->name('mypage.unfavorite');
Route::get('mypage/password/edit', 'UserController@edit_password')->name('mypage.edit_password');
Route::put('mypage/password', 'UserController@update_password')->name('mypage.update_password');

Route::post('products/{product}/reviews', 'ReviewController@store')->name('review.store');
Route::get('products/{product}/favorite', 'ProductController@favorite')->name('products.favorite');
// Route::resource('products', 'ProductController');
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/{product}', 'ProductController@show')->name('products.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard', 'DashboardController@index')->middleware('auth:admins');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('login', 'Dashboard\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Dashboard\Auth\LoginController@login')->name('login');
    Route::resource('categories', 'Dashboard\CategoryController')->middleware('auth:admins');
    Route::resource('products', 'Dashboard\ProductController')->middleware('auth:admins');
});

if (App::environment('production')) {
    URL::forceScheme('https');
}
