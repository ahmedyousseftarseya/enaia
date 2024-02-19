<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\LangController;
use App\Http\Controllers\Admin\NurseController;
use App\Http\Controllers\Admin\HeadNurseController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
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


/** in RouteServiceProvider */
// prefix => admin
// name => admin.
// namespace => App\Http\Controllers\Admin

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('lang/{locale}', [LangController::class, 'index'])->name('lang');

// 
Route::middleware('auth:admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::resource('doctors', DoctorController::class);
    Route::resource('nurses', NurseController::class);
    Route::resource('head-nurses', HeadNurseController::class);

    Route::resource('services', ServiceController::class);
    Route::post('change-status', [ServiceController::class, 'changeStatus'])->name('services.changeStatus');

    Route::resource('admins', AdminController::class);
    Route::resource('roles', RoleController::class);
});



Route::get('{any}', [HomeController::class, 'notFound'])->name('notFound');


