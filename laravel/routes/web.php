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

Route::get('prueba',function(){return view('principal.prueba');});


// API
Route::get('api/categories','ApiController@categories');
Route::get('api/products','ApiController@products');
Route::post('api/users','ApiController@users');
Route::get('api/prodcat','ApiController@categoriesAndProducts');
// API

//DAsHBOARD ADMINISTRADOR
Route::get('admin/addProduct','AdminController@addProduct');
Route::get('admin/catalog/{id}','AdminController@editor');
Route::get('admin/catalog','AdminController@catalog');
Route::get('admin/users', 'AdminController@users');
Route::get('admin/user/{id}','AdminController@editorUser');
Route::post('admin/user/change','AdminController@editUser');
Route::post('admin/catalog','ProductController@edit');
//DAsHBOARD ADMINISTRADOR

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

//LOGIN
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

//LOGIN

Route::get('faqs', 'HomeController@preguntas');


// CARRITO
Route::get('cart/add/{id}', 'CartController@add');
Route::get('cart/show', 'CartController@show');
Route::get('cart/borrar/{id}', 'CartController@quitar');
Route::get('cart/defaultview', 'CartController@show');
// CARRITO

Route::get('categories','CategoryController@index');
Route::get('categories/{name}','CategoryController@show');
Route::get('categories/{name}/{product}','ProductController@show');
Route::delete('admin/catalog','ProductController@delete');
Route::post('admin/user/delete/{id}','UserController@delete');
Route::post('admin/addProduct','ProductController@add');
