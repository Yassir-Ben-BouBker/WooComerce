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
    return view('dashboard.auth');
});

Route::post('/Connection','DashboardController@connection');
Route::get('/Logout','DashboardController@logout');


Route::get('/dashboard','DashboardController@index');

// Products CRUD
Route::get('/dashboard/products','productsController@list');
Route::delete('/dashboard/products/delete','productsController@delete');
Route::get('/dashboard/products/update/{id}','productsController@update');
Route::post('/dashboard/products/update','productsController@modify');
Route::get('/dashboard/products/create','productsController@create');
Route::post('/dashboard/products/add','productsController@add');
Route::get('/dashboard/products/show/{id}','productsController@show');

// Customers CRUD
Route::get('/dashboard/customers','customersController@list');
Route::delete('/dashboard/customers/delete','customersController@delete');
Route::get('/dashboard/customers/update/{id}','customersController@update');
Route::post('/dashboard/customers/update','customersController@modify');
Route::get('/dashboard/customers/create','customersController@create');
Route::post('/dashboard/customers/add','customersController@add');
Route::get('/dashboard/customers/show/{id}','customersController@show');

// Orders CRUD
Route::get('/dashboard/orders','ordersController@list');
Route::delete('/dashboard/orders/delete','ordersController@delete');
Route::get('/dashboard/orders/update/{id}','ordersController@update');
Route::post('/dashboard/orders/update','ordersController@modify');
Route::get('/dashboard/orders/create','ordersController@create');
Route::post('/dashboard/orders/add','ordersController@add');
Route::get('/dashboard/orders/show/{id}','ordersController@show');

// Exporting

Route::get('/dashboard/products/excel','productsController@excel');
Route::get('/dashboard/customers/excel','customersController@excel');
Route::get('/dashboard/orders/excel','ordersController@excel');

// importing

Route::post('/dashboard/products/upload','productsController@productsImport');


