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

Route::get('/', function () { return view('index'); })->name('index');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/menu', 'PagesController@menu')->name('menu');
Route::get('/order', 'PagesController@order')->name('order');
Route::get('/add/{id}/{name}/{price}', 'OrdersController@create')->name('add');
Route::get('/add/{id}/{name}/{price}', 'OrdersController@create')->name('add');
Route::get('/cart/clear', 'OrdersController@clear')->name('cart.clear');
Route::get('/cart/success', 'OrdersController@success')->name('cart.success');
Route::post('/cart/order', 'OrdersController@store')->name('cart.order');
Route::post('/cart/comment', 'OrdersController@comment')->name('cart.comment');

Auth::routes();

Route::get('/admin/home', 'HomeController@index')->name('home');
Route::get('/admin/add', 'ItemController@index')->name('admin.add.show');
Route::get('/admin/add/user', 'HomeController@addshowuser')->name('admin.add.show.user');
Route::get('/admin/salaries', 'HomeController@salaries')->name('admin.salaries');
Route::get('/admin/supplies', 'HomeController@supplies')->name('admin.supplies');
Route::get('/admin/orders', 'HomeController@orders')->name('admin.orders');
Route::get('/admin/order/approve/{id}', 'HomeController@approveorder')->name('admin.order.approve');
Route::get('/admin/order/remove/{id}', 'HomeController@removeorder')->name('admin.order.remove');
Route::get('/admin/item/remove/{id}', 'HomeController@removeitem')->name('admin.item.remove');
Route::get('/admin/supplies', 'HomeController@supplies')->name('admin.supplies');
Route::get('/admin/salaries', 'HomeController@salaries')->name('admin.salaries');
Route::get('/admin/workclock', 'HomeController@clock')->name('admin.clock');
Route::get('/admin/comments', 'HomeController@comments')->name('admin.comments');
Route::post('/admin/item/add', 'ItemController@store')->name('admin.add.post');
Route::post('/admin/user/add', 'HomeController@storeuser')->name('admin.add.user');
Route::post('/admin/item/edit', 'ItemController@edit')->name('admin.edit.post');
