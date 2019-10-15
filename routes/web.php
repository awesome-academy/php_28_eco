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
    return view('admin.layouts.master');
});

Route::get('lang/{lang}', 'LanguageController@changeLang')->name('language');

Route::group(['prefix' => 'auth'], function() {
	Route::get('register', 'Auth\RegisterController@getRegister')->name('get-register');
	Route::post('register', 'Auth\RegisterController@postRegister')->name('post-register');

	Route::get('login', 'Auth\LoginController@getLogin')->name('get-login');
	Route::post('login', 'Auth\LoginController@postLogin')->name('post-login');

	Route::get('logout', 'Auth\LoginController@getLogout')->name('get-logout');
});

Route::group(['prefix' => 'admin'], function() {
	Route::group(['prefix' => 'category'], function() {
		Route::get('/', 'CategoryController@index')->name('category-list');
		Route::get('create', 'CategoryController@create')->name('category-create');
		Route::post('create', 'CategoryController@store')->name('category-store');
		Route::get('edit/{id}', 'CategoryController@edit')->name('category-edit');
		Route::post('edit/{id}', 'CategoryController@update')->name('category-update');
		Route::delete('delete/{id}', 'CategoryController@delete')->name('category-delete');
	});

	Route::group(['prefix' => 'product'], function() {
		Route::get('/', 'ProductController@index')->name('product-list');
		Route::get('create', 'ProductController@create')->name('product-create');
		Route::get('create/{idCateParent}', 'ProductController@getSubCategory');
		Route::post('create', 'ProductController@store')->name('product-store');
		Route::get('edit/{id}', 'ProductController@edit')->name('product-edit');
		Route::post('edit/{id}', 'ProductController@update')->name('product-update');
		Route::get('del-image/{idHinh}', 'ProductController@delImageDetail')->name('product-del-img');
		Route::delete('delete/{id}', 'ProductController@delete')->name('product-delete');
	});

});

Route::group(['prefix' => 'user'], function() {
	Route::get('/', 'PageController@index')->name('home');
	Route::get('profile', 'PageController@editProfile')->name('edit-profile');
	Route::post('profile/{id}', 'PageController@updateProfile')->name('update-profile');
});
