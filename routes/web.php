<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\JabatanController;
use App\Http\Controllers\Backend\KaryawanController;
use App\Http\Controllers\Backend\ChangePasswordController;
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
Route::resource('users', UserController::class);
Route::resource('units', UnitController::class);
Route::resource('jabatans', JabatanController::class);
Route::resource('karyawans', KaryawanController::class);
Route::post('users/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('users.change.password');
Route::get('/karyawans/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawans.edit');
Route::delete('/karyawans/{id}', [KaryawanController::class, 'destroy'])->name('karyawans.destroy');
