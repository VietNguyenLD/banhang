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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Product
Route::get('/add-product', 'ProductController@index');
Route::post('/insert-product', 'ProductController@insert_product');
Route::post('/update-product/{id}', 'ProductController@update_product');
Route::get('/edit-product/{id}', 'ProductController@edit_product');
Route::get('/delete-product/{id}', 'ProductController@delete_product');
//Storage
Route::get('/add-storage', 'StorageController@index');
Route::get('/check-product', 'StorageController@check_product');
Route::get('/update-storage', 'StorageController@update_storage');
//Oder
Route::get('/add-oder', 'OderController@index');
Route::get('/checkproduct', 'OderController@checkproduct');
Route::post('/add-order', 'OderController@addnew');