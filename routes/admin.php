<?php

use App\Http\Controllers\System\AccountController;
use App\Http\Controllers\System\HomeController;
use App\Http\Controllers\System\LoginController;
use App\Http\Controllers\System\TenantController;
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


Route::prefix('admin')->as('admin.')->group(function () {

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');

    Route::middleware('admin')->group(function () {

        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('/', function(){ return redirect('admin/dashboard'); });
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

        Route::resource('accounts', AccountController::class);

        Route::resource('tenants', TenantController::class);

    });
});

