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

Route::get('api/categories','ApiController@categories');
Route::get('api/products','ApiController@products');
Route::post('api/users','ApiController@users');
Route::get('api/prodcat','ApiController@categoriesAndProducts');

Route::get('admin/addProduct','AdminController@addProduct');
Route::get('admin/catalog','AdminController@catalog');
Route::get('admin/index','AdminController@index');
Route::get('admin/users', 'AdminController@users');

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('prueba','AdminController@show');

Route::get('pruebas', function () {
    return view('admin.app');
});

Route::get('admin/catalog','AdminController@catalog');
