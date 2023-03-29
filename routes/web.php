<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/orders', 'App\Http\Controllers\OrderController');
Route::resource('/products', 'App\Http\Controllers\ProductController');
Route::resource('/suppliers', 'App\Http\Controllers\SupplierController');
Route::resource('/users', 'App\Http\Controllers\UserController');
Route::resource('/companies', 'App\Http\Controllers\CompanyController');
Route::resource('/transaction', 'App\Http\Controllers\TransactionController');
Route::resource('/shippers', 'App\Http\Controllers\ShipperController');
Route::resource('/customers', 'App\Http\Controllers\CustomerController');
Route::resource('/shippers', 'App\Http\Controllers\ShipperController');
Route::resource('/inventories', 'App\Http\Controllers\InventoryController');
// Route::get('/orders.test', 'App\Http\Controllers\OrderController', 'test');