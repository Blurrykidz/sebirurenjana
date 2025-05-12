<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/hash', [LoginController::class, 'hash']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/ubahpassword', [UserController::class, 'ubahPassword']);
    Route::post('/ubahpassword', [UserController::class, 'updatePassword']);
});

Route::group(['middleware' => 'role:admin'], function () {

    Route::resource('/pengguna', UserController::class);
    Route::resource('/satuan', SatuanController::class);
    Route::resource('/master-product', ProductController::class);

});

Route::get('/renjana', function () {
    return view('renjana');
});

// error section
Route::get('/error403', function () {
    return abort('403', 'anda tidak memiliki akses');
});
