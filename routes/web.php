<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WebsiteController@index')->name('website');


Route::middleware('guest:admin')->group(function () {
    Route::get('/login', 'AuthController@get_login')->name('website.get.login');
    Route::post('/login', 'AuthController@login')->name('website.login');
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('account')->group(function () {
        Route::get('/', 'AuthController@account')->name('website.get.account');
        Route::post('/password', 'AuthController@update_password')->name('website.update.password');
        Route::get('/logout', 'AuthController@logout')->name('website.logout');
    });
});

Route::post('/order', 'OrderController@order')->name('website.order');
