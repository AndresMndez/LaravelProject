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


// API
Route::get('api/categories','ApiController@categories');
Route::get('api/products','ApiController@products');
Route::post('api/users','ApiController@users');
Route::get('api/prodcat','ApiController@categoriesAndProducts');
// API

//DAsHBOARD ADMINISTRADOR
Route::get('admin/addProduct','AdminController@addProduct');
Route::get('admin/catalog','AdminController@catalog');
Route::get('admin/index','AdminController@index');
Route::get('admin/users', 'AdminController@users');
//DAsHBOARD ADMINISTRADOR

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

//LOGIN
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

//LOGIN

Route::get('faqs', 'HomeController@preguntas');

Route::get('admin/catalog','AdminController@catalog');


// CARRITO
Route::get('cart/add/{id}', 'CartController@add');
Route::get('cart/show', 'CartController@show');
Route::get('cart/borrar/{id}', 'CartController@quitar');
Route::get('cart/defaultview', 'CartController@show');
// CARRITO

Route::get('categories','CategoryController@index');
Route::get('categories/{name}','CategoryController@show');
Route::get('categories/{name}/{product}','ProductController@show');
