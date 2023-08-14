<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::group(['middleware' => ['guest']], function () {
    Route::post('/', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::get('register', [AuthenticatedSessionController::class, 'register_view'])->name('register');
});



Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [AuthenticatedSessionController::class, 'home'])->name('home');
    Route::get('logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
    Route::post('insert-state', [StateController::class, 'insert_state'])->name('insert');
    Route::get('/home', [StateController::class, 'Showdata'])->name('home');
    Route::get('delete/{id}', [StateController::class, 'delete_state']);
    Route::get('edit/{id}', [StateController::class, 'edit_state']);
    Route::post('update/{id}', [StateController::class, 'update_state']);
});

