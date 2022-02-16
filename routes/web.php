<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/admin_login_submit', [App\Http\Controllers\AdminController::class, 'admin_login_submit'])->name('admin_login_submit');


Route::post('/admin_register_submit', [App\Http\Controllers\AdminController::class, 'admin_register_submit'])->name('admin_register_submit');

Route::get('/admin_logout', [App\Http\Controllers\AdminController::class, 'admin_logout'])->name('admin_logout');





Route::group(['middleware'=>['adminauth']], function(){


    Route::get('admin_login', [App\Http\Controllers\AdminController::class, 'admin_login'])->name('admin_login');

    Route::get('admin_register', [App\Http\Controllers\AdminController::class, 'admin_register'])->name('admin_register');

     Route::get('admin_profile', [App\Http\Controllers\AdminController::class, 'admin_profile'])->name('admin_profile');

     Route::post('admin_profile_submit', [App\Http\Controllers\AdminController::class, 'admin_profile_submit'])->name('admin_profile_submit');
     
      Route::get('admin_dashboard', [App\Http\Controllers\AdminController::class, 'admin_dashboard'])->name('admin_dashboard');

      Route::get('view_admin', [App\Http\Controllers\AdminController::class, 'view_admin'])->name('view_admin');

      Route::post('view_admin_update', [App\Http\Controllers\AdminController::class, 'view_admin_update'])->name('view_admin_update'); 
        Route::post('view_admin_delete', [App\Http\Controllers\AdminController::class, 'view_admin_delete'])->name('view_admin_delete');

});