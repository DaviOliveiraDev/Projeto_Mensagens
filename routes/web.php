<?php

use App\Http\Controllers\AvisoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AvisoUserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


Route::group(['middleware' => ['auth']], function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])-> name('users.index');
        Route::get('new', [UserController::class, 'new'])-> name('users.new');
        Route::post('store', [UserController::class, 'store'])-> name('users.store');
        Route::get('edit/{user}', [UserController::class, 'edit'])-> name('users.edit');
        Route::post('update/{user}', [UserController::class, 'update'])-> name('users.update');
        Route::get('remove/{user}', [UserController::class, 'delete'])-> name('users.remove');
    });

    Route::prefix('avisos')->group(function () {
        Route::get('/', [AvisoController::class, 'index'])-> name('avisos.index');
        Route::get('new', [AvisoController::class, 'new'])-> name('avisos.new');
        Route::post('store', [AvisoController::class, 'store'])-> name('avisos.store');
        Route::get('edit/{aviso}', [AvisoController::class, 'edit'])-> name('avisos.edit');
        Route::post('update/{aviso}', [AvisoController::class, 'update'])-> name('avisos.update');
        Route::get('remove/{aviso}', [AvisoController::class, 'delete'])-> name('avisos.remove');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
