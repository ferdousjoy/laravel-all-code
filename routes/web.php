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


Route::get('/','FrontendController@index');
Route::get('/add/cart/{products_id}','FrontendController@addcart');
Route::get('/cart/delete/{cart_id}','FrontendController@deletecart');
Route::get('/cart','FrontendController@cart');
Route::post('/update/cart','FrontendController@updatecart');

Route::get('/add/category','ProductController@addcategory');
Route::post('/category/insert','ProductController@categoryinsert');
Route::get('/change/status/{category_id}','ProductController@change');



Route::get('/add/product','ProductController@addproduct');
Route::post('/product/insert','ProductController@productinsert');
Route::get('/all/msg','ProductController@allmsg');
Route::get('/delete/product/{product_id}','ProductController@productdelete');
Route::get('/restore/product/{product_id}','ProductController@productrestore');
Route::get('/edit/product/{product_id}','ProductController@productedit');
Route::post('/update/product','ProductController@productupdate');
Route::post('/final/checkout','FrontendController@finalcheckout');
Route::get('/customer/area', 'CustomerController@customerarea');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add/banner', 'HomeController@addbanner');
Route::post('/banner/insert', 'HomeController@bannerinsert');
Route::post('/coupon/insert', 'HomeController@couponinsert');
Route::get('/add/coupon', 'HomeController@addcoupon');


Route::get('login/github', 'GithubController@redirectToProvider');
Route::get('login/github/callback', 'GithubController@handleProviderCallback');

Route::get('login/google', 'GoogleController@redirectToProvider');
Route::get('login/google/callback', 'GoogleController@handleProviderCallback');

Route::get('/test', function(){
    return new App\Mail\OrderConfirm(11);
});
