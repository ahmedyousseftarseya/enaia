<?php

use Illuminate\Support\Facades\Route;
use Modules\Accountant\App\Http\Controllers\AccountantController;
use Modules\Accountant\App\Http\Controllers\LangController;
use Modules\Accountant\App\Http\Controllers\LoginController;

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

/** in RouteServiceProvider */
// prefix => accountant
// name => accountant.

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('lang/{locale}', [LangController::class, 'index'])->name('lang');

Route::group([], function () {
    Route::resource('/', AccountantController::class);
});
