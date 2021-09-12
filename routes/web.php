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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/profile', 'HomeController@profile');
Route::post('/profile', 'HomeController@update_avatar');
Route::get('/', 'ProductController@index');
/**************************************/
Route::get('/home', 'GestionController@read');
Route::get('/create', 'GestionController@create')->name('create.product');
Route::post('/store', 'GestionController@store')->name('product.store');
Route::get('edit/{id}', 'GestionController@edit');
Route::get('delete/{id}', 'GestionController@delete');
Route::post('update/{id}', 'GestionController@update');
Route::get('show/{id}', 'GestionController@show');
Route::post('show/{id}/comment', 'CommentController@storecomment');
Route::post('/show/{id}/offer', 'GestionController@offer');
Route::get('/show/{id}/{cid}', 'CommentController@delete');
Route::get('/offers', 'GestionController@offers');
Route::get('/category/{category}', 'ProductController@category');
Route::get('/search', 'ProductController@search');
Route::get('/accept/{id}', 'GestionController@accept');
Route::get('/refuse/{id}', 'GestionController@refuse');
Route::get('/deleteoffer/{id}', 'GestionController@offerdelete');
Route::get('/paiment', 'PaymentController@index');



// /accept/{{$product->id}}
// /deleteoffer/
// /refuse/{{$product->id}}

