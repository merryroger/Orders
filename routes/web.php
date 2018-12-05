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

Route::namespace('Admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/orders', 'OrderController@index')->name('orders.list');

            Route::get('/products', 'ProductController@index')->name('products.list');
            Route::get('/products/add', 'ProductController@add')->name('products.add');
            Route::post('/products/store', 'ProductController@store')->name('products.store');
            Route::delete('/products/remove/{product}', 'ProductController@softDelete')->name('products.remove');
            Route::get('/products/restore/{product_id}', 'ProductController@restore')->name('products.restore');
        });
    });
});

Route::prefix('orders')->group(function () {
    Route::name('orders')->group(function () {
        Route::get('/', 'OrderController@index')->name('.index');
        Route::post('/store', 'OrderController@store')->name('.store');
    });
});

Route::namespace('Auth')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect('orders');
    });
});
