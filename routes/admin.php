<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\LangController;
use App\Http\Controllers\Admin\NurseController;
use App\Http\Controllers\Admin\HeadNurseController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
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
    Route::get('/', [HomeController::class, 'index'])->name('index')->middleware('permission:admin_read-dashboard');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');

    // Route::resource('doctors', DoctorController::class);
    Route::controller(DoctorController::class)->name('doctors.')->prefix('doctors')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('show/{doctor}', 'show')->name('show')->middleware('permission:admin_read-doctors');
        Route::get('create', 'create')->name('create')->middleware('permission:admin_create-doctors');
        Route::post('store', 'store')->name('store')->middleware('permission:admin_create-doctors');
        Route::get('edit/{doctor}', 'edit')->name('edit')->middleware('permission:admin_update-doctors');
        Route::put('update/{doctor}', 'update')->name('update')->middleware('permission:admin_update-doctors');
        Route::post('destroy/{doctor}', 'update')->name('destroy')->middleware('permission:admin_delete-doctors');
    });

    // Route::resource('nurses', NurseController::class);
    Route::controller(NurseController::class)->name('nurses.')->prefix('nurses')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('show/{nurse}', 'show')->name('show')->middleware('permission:admin_read-nurses');
        Route::get('create', 'create')->name('create')->middleware('permission:admin_create-nurses');
        Route::post('store', 'store')->name('store')->middleware('permission:admin_create-nurses');
        Route::get('edit/{nurse}', 'edit')->name('edit')->middleware('permission:admin_update-nurses');
        Route::put('update/{nurse}', 'update')->name('update')->middleware('permission:admin_update-nurses');
        Route::post('destroy/{nurse}', 'update')->name('destroy')->middleware('permission:admin_delete-nurses');
    });
    
    // Route::resource('head-nurses', HeadNurseController::class);
    Route::controller(HeadNurseController::class)->name('head-nurses.')->prefix('head-nurses')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('show/{nurse}', 'show')->name('show')->middleware('permission:admin_read-head-nurses');
        Route::get('create', 'create')->name('create')->middleware('permission:admin_create-head-nurses');
        Route::post('store', 'store')->name('store')->middleware('permission:admin_create-head-nurses');
        Route::get('edit/{nurse}', 'edit')->name('edit')->middleware('permission:admin_update-head-nurses');
        Route::put('update/{nurse}', 'update')->name('update')->middleware('permission:admin_update-head-nurses');
        Route::post('destroy/{nurse}', 'update')->name('destroy')->middleware('permission:admin_delete-head-nurses');
    });

    // Route::resource('users', UserController::class);
    Route::controller(UserController::class)->name('users.')->prefix('users')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('show/{user}', 'show')->name('show')->middleware('permission:admin_read-customers');
        Route::get('create', 'create')->name('create')->middleware('permission:admin_create-customers');
        Route::post('store', 'store')->name('store')->middleware('permission:admin_create-customers');
        Route::get('edit/{user}', 'edit')->name('edit')->middleware('permission:admin_update-customers');
        Route::put('update/{user}', 'update')->name('update')->middleware('permission:admin_update-customers');
        Route::post('destroy/{user}', 'update')->name('destroy')->middleware('permission:admin_delete-customers');
        Route::post('change-status', 'changeStatus')->name('changeStatus')->middleware('permission:admin_update-status-customers');
    });

    //read-settings
    Route::controller(SettingController::class)->name('settings.')->prefix('settings')->group(function () {
        Route::get('global-settings', 'globalSettings')->name('globalSettings')->middleware('permission:admin_read-settings');
        Route::get('conatct-settings', 'contactSettings')->name('contactSettings')->middleware('permission:admin_read-settings');
        Route::post('global-settings', 'update')->name('update')->middleware('permission:admin_update-settings');
    });

    // Route::resource('services', ServiceController::class);
    Route::controller(ServiceController::class)->name('services.')->prefix('services')->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('show/{service}', 'show')->name('show')->middleware('permission:admin_read-services');
        Route::get('create', 'create')->name('create')->middleware('permission:admin_create-services');
        Route::post('store', 'store')->name('store')->middleware('permission:admin_create-services');
        Route::get('edit/{service}', 'edit')->name('edit')->middleware('permission:admin_update-services');
        Route::post('update/{service}', 'update')->name('update')->middleware('permission:admin_update-services');
        Route::put('destroy/{service}', 'update')->name('destroy')->middleware('permission:admin_delete-services');
        Route::post('change-status', 'changeStatus')->name('changeStatus')->middleware('permission:admin_update-status-services');
    });

    // Route::resource('admins', AdminController::class);
    Route::controller(AdminController::class)->name('admins.')->prefix('admins')->group(function () {
        Route::get('index', 'index')->name('index')->middleware('permission:admin_read-admins');
        Route::get('show/{admin}', 'show')->name('show')->middleware('permission:admin_read-admins');
        Route::get('create', 'create')->name('create')->middleware('permission:admin_create-admins');
        Route::post('store', 'store')->name('store')->middleware('permission:admin_create-admins');
        Route::get('edit/{admin}', 'edit')->name('edit')->middleware('permission:admin_update-admins');
        Route::put('update/{admin}', 'update')->name('update')->middleware('permission:admin_update-admins');
        Route::post('destroy/{admin}', 'update')->name('destroy')->middleware('permission:admin_delete-admins');
    });

    // Route::resource('roles', RoleController::class);
    Route::controller(RoleController::class)->name('roles.')->prefix('roles')->group(function () {
        Route::get('index', 'index')->name('index')->middleware('permission:admin_read-roles');
        Route::get('create', 'create')->name('create')->middleware('permission:admin_create-roles');
        Route::post('store', 'store')->name('store')->middleware('permission:admin_create-roles');
        Route::get('edit/{role}', 'edit')->name('edit')->middleware('permission:admin_update-roles');
        Route::put('update/{role}', 'update')->name('update')->middleware('permission:admin_update-roles');
        Route::post('destroy/{role}', 'update')->name('destroy')->middleware('permission:admin_delete-roles');
    });

    // Route::resource('countries', CountryController::class);
    Route::controller(CountryController::class)->name('countries.')->prefix('countries')->group(function () {
        Route::get('index', 'index')->name('index')->middleware('permission:admin_read-countries');
        Route::get('create', 'create')->name('create')->middleware('permission:admin_create-countries');
        Route::post('store', 'store')->name('store')->middleware('permission:admin_create-countries');
        Route::get('edit/{country}', 'edit')->name('edit')->middleware('permission:admin_update-countries');
        Route::put('update/{country}', 'update')->name('update')->middleware('permission:admin_update-countries');
        Route::post('destroy/{country}', 'update')->name('destroy')->middleware('permission:admin_delete-countries');
    });
    
    // Route::resource('cities', CityController::class);
    Route::controller(CityController::class)->name('cities.')->prefix('cities')->group(function () {
        Route::get('index', 'index')->name('index')->middleware('permission:admin_read-cities');
        Route::get('create', 'create')->name('create')->middleware('permission:admin_create-cities');
        Route::post('store', 'store')->name('store')->middleware('permission:admin_create-cities');
        Route::get('edit/{city}', 'edit')->name('edit')->middleware('permission:admin_update-cities');
        Route::put('update/{city}', 'update')->name('update')->middleware('permission:admin_update-cities');
        Route::post('destroy/{city}', 'update')->name('destroy')->middleware('permission:admin_delete-cities');
    });

});


Route::get('/not-authorized', function () {
    return view('admin.errors.403');
})->name('not-authorized');


Route::get('/{any}', [HomeController::class, 'notFound'])->where('any', '.*');

