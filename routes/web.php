<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'] ], function(){

    Route::get('/', [HomeController::class , 'index'])->name('admin.home');

    Route::get('/flot', [HomeController::class , 'flot'])->name('admin.flot');
    Route::get('/morris', [HomeController::class , 'morris'])->name('admin.morris');

    Route::get('/tables', [HomeController::class , 'tables'])->name('admin.tables');
});

