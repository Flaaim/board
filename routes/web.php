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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cabinet', [App\Http\Controllers\Cabinet\HomeController::class, 'index'])->name('cabinet');

Auth::routes(['verify' => true]);


Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'verified'],
], function(){
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');
    Route::resource('users', App\Http\Controllers\Admin\UsersController::class);
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    Route::get('permissions', [App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('permissions.index');
    Route::post('permissions', [App\Http\Controllers\Admin\PermissionController::class, 'store'])->name('permissions.store');
    Route::post('verify/{user}', [App\Http\Controllers\Admin\UsersController::class, 'verify'])->name('users.verify');
});

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

