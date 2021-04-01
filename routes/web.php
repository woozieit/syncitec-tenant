<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('{tenant}/dashboard', function ($tenant) {
    //Session::push('tenant', $tenant);
    return $tenant;
});

Route::get('{tenant}/login', function ($tenant) {
    return $tenant;
});
