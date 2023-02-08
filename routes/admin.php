<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "admin" middleware group. Enjoy building your Admin!
|
*/

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get(
        'dashboard',
        [DashboardController::class, 'dashboard']
    )->name('dashboard');
    Route::prefix('apartments')->name('apartments.')->group(function () {
        Route::get('', [ApartmentController::class, 'index'])->name('index');
        Route::get('/create', [ApartmentController::class, 'create'])->name('create');
        Route::post('/create', [ApartmentController::class, 'store'])->name('create.store');
        Route::get('/edit/{id}', [ApartmentController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [ApartmentController::class, 'update'])->name('edit.update');
        Route::get('/view/{id}', [ApartmentController::class, 'view'])->name('view');
        Route::delete('/delete', [ApartmentController::class, 'delete'])->name('delete');
    });
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/create', [UserController::class, 'store'])->name('create.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [UserController::class, 'update'])->name('edit.update');
        Route::get('/view/{id}', [UserController::class, 'view'])->name('view');
        Route::delete('/delete', [UserController::class, 'delete'])->name('delete');
    });
});
