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

Route::get('/', function () {
    return view('welcome');
});

 ######################  Items Routes #################################################
 Route::get('/items', 'ItemController@index')->name('items.index');
 Route::get('/items/create','ItemController@create')->name('items.create');
 Route::post('/items','ItemController@store')->name('items.store');
 Route::get('/items/{item}/edit','ItemController@edit')->name('items.edit');
 Route::put('/items/{item}','ItemController@update')->name('items.update');

  ######################  Categories Routes #################################################
  Route::get('/categories', 'CategoryController@index')->name('categories.index');
  Route::get('/categories/create','CategoryController@create')->name('categories.create');
  Route::post('/categories','CategoryController@store')->name('categories.store');
