<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true ");
header("Access-Control-Allow-Methods: OPTIONS, GET, POST");

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

Route::get('auth/login', 'UsersController@login');
Route::post('auth/login', 'UsersController@authenticate');
Route::get('auth/logout', 'UsersController@logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/all', 'UsersController@apis');
Route::get('/api/v1/Users', 'UsersController@index');

Route::get('/api/v1/user/login', 'UsersController@login');
Route::get('/api/v1/user/{id}', 'UsersController@UserByIdGet');

Route::get('/api/v1/produce/all', 'ProducesController@index');
Route::get('/api/v1/produce/byId/{id}', 'ProducesController@ByIdGet');
Route::get('/api/v1/produce/byUserId/{id}', 'ProducesController@ByUserIdGet');

Route::get('/api/v1/buyers/all', 'UsersController@BuyersAllGet');
Route::get('/api/v1/producers/all', 'UsersController@ProducersAllGet');

Route::get('/api/v1/orders/all', 'OrdersController@index');
Route::post('/api/v1/orders/activition', 'OrdersController@activition');
Route::post('/api/v1/orders/create', 'OrdersController@create');

Route::get('/api/v1/locations/all', 'LocationsController@index');
Route::get('/api/v1/locations/{id}', 'LocationsController@ByIdGet');


Route::put('/api/v1/bids/create', 'BidsController@create');

Auth::routes();

Route::get('/home', 'HomeController@index');
