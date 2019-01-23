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
Route::get('/','FrontController@index')->name('home');
Route::resource('categories','CategoriesController');
Route::resource('cart','CartController');
Route::get('/productsU','ProductsController@index2');
Route::get('/category/{id}/products','CategoriesController@user_show');

Route::resource('products','ProductsController');
Route::get('/cartU','CartController@cart');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){

Route::get('/', function(){
return view ('admin.index'); 
})->name('admin.index');

});
Route::group(['prefix'=>'','middleware'=>['auth','admin']],function(){

});