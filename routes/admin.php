<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Hello From Dashboard!";
});
// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->name('dashboard.index');

// Route::get('/dashboard/order/details', function () {
//     return view('dashboard.orders.details');
// })->name('dashboard.order.details');

// Route::get('/account/management', function () {
//     return view('dashboard.settings.accounts');
// })->name('dashboard.account.management');
