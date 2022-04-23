<?php

use Illuminate\Support\Facades\Route;



Route::middleware('guest:admin')->group(function () {
    Route::get('/login', 'AuthController@get_login')->name('dashboard.get.login');
    Route::post('/login', 'AuthController@login')->name('dashboard.login');
});

Route::middleware('auth:admin')->group(function () {

    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::prefix('account')->group(function () {
        Route::get('/', 'AuthController@account')->name('dashboard.get.account');
        Route::post('/password', 'AuthController@update_password')->name('dashboard.update.password');
        Route::get('/logout', 'AuthController@logout')->name('dashboard.logout');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', 'OrderController@index')->name('dashboard.orders');
        Route::get('/view/{order_id}', 'OrderController@view')->name('dashboard.order.view');
        Route::post('/confirm', 'OrderController@confirm')->name('dashboard.confirm.order');
        Route::post('/delete', 'OrderController@delete')->name('dashboard.delete.order');
    });

    Route::prefix('management')->group(function () {
        Route::prefix('accounts')->group(function () {
            Route::get('/', 'AdminController@index')->name('dashboard.management.accounts');
            Route::get('/new', 'AdminController@new')->name('dashboard.new.admin');
            Route::post('/new', 'AdminController@save')->name('dashboard.save.admin');
            Route::get('/edit/{admin_id}', 'AdminController@edit')->name('dashboard.edit.admin');
            Route::post('/update/{admin_id}', 'AdminController@update')->name('dashboard.update.admin');
            Route::post('/delete', 'AdminController@delete')->name('dashboard.delete.admin');
        });
    });

    Route::prefix('menu')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::get('/', 'MenuController@index_category')->name('dashboard.categories');
            Route::get('/new', 'MenuController@new_category')->name('dashboard.new.category');
            Route::post('/new', 'MenuController@save_category')->name('dashboard.save.category');
            Route::get('/edit/{category_id}', 'MenuController@edit_category')->name('dashboard.edit.category');
            Route::post('/edit/{category_id}', 'MenuController@update_category')->name('dashboard.update.category');
            Route::post('/delete', 'MenuController@delete_category')->name('dashboard.delete.category');
        });
        Route::prefix('items')->group(function () {
            Route::get('/', 'MenuController@index_item')->name('dashboard.items');
            Route::get('/new', 'MenuController@new_item')->name('dashboard.new.item');
            Route::post('/new', 'MenuController@save_item')->name('dashboard.save.item');
            Route::get('/edit/{item_id}', 'MenuController@edit_item')->name('dashboard.edit.item');
            Route::post('/edit/{item_id}', 'MenuController@update_item')->name('dashboard.update.item');
            Route::post('/delete', 'MenuController@delete_item')->name('dashboard.delete.item');
        });
    });
});
