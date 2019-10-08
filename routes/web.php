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

Route::group(['prefix' => 'admin'], function() {
	Route::get('category', 'CategoryController@index')->name('category-list');
	Route::get('category/create', 'CategoryController@create')->name('category-create');
	Route::post('category/create', 'CategoryController@store')->name('category-store');
	Route::get('category/edit/{id}', 'CategoryController@edit')->name('category-edit');
	Route::post('category/edit/{id}', 'CategoryController@update')->name('category-update');
});
