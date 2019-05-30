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

Route::get('/','PageController@index');

Auth::routes();

Route::get('/home', 'PageController@index')->name('home');

Route::get('/avatar', 'HomeController@avatar');
Route::post('/upload', 'HomeController@upload');

Route::get('shop_info','HomeController@getShopInfo');
Route::post('shop_info','HomeController@postShopInfo');

Route::get('/shop_image', 'HomeController@getShopImage');
Route::post('/shop_image_upload', 'HomeController@uploadShopImage');

Route::get('/shop_detail/{id}','HomeController@getShopDetail')->name('/shop_detail');

Route::get('/category/{word}','PageController@getCategory');
