<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\UserController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('apartments')->name('apartment.')->group(function () {
    Route::get('/', [ApartmentController::class, 'index'])->name('index');
    Route::get('/{id}', [ApartmentController::class, 'getOneApartment'])->name('get');
    Route::post('/create', [ApartmentController::class, 'store'])->name('create.store');
    Route::post('/edit/{id}', [ApartmentController::class, 'update'])->name('edit.update');
    Route::delete('/delete/{id}', [ApartmentController::class, 'delete'])->name('delete');
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/{id}', [UserController::class, 'getOneUser'])->name('get');
    Route::post('/create', [UserController::class, 'store'])->name('create.store');
    Route::post('/edit/{id}', [UserController::class, 'update'])->name('edit.update');
    Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('delete');
    Route::post('/change-password/{id}', [UserController::class, 'savePassword'])->name('change_password');
});
