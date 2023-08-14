<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StateController;
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



Route::group(['middleware' => ['guest', 'countryblocker']], function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login')->middleware('throttle:2,1');

    Route::get('register', [AuthController::class, 'register_view'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register')->middleware('throttle:2,1');
});



Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [AuthController::class, 'home'])->name('home');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('insert-state', [StateController::class, 'insert_state'])->name('insert');
    Route::get('/home', [StateController::class, 'Showdata'])->name('home');
    Route::get('delete/{id}', [StateController::class, 'delete_state']);
    Route::get('edit/{id}', [StateController::class, 'edit_state']);
    Route::post('update/{id}', [StateController::class, 'update_state']);
});
