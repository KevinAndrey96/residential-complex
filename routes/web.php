<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 

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
Route::get('superadmins/login', [App\Http\Controllers\Superadmins\SuperadminsLoginController::class, 'showLoginForm']);
Route::post('superadmins/login', [App\Http\Controllers\Superadmins\SuperadminsLoginController::class, 'login']);
Route::get('superadmins/area', [App\Http\Controllers\Superadmins\SuperadminsLoginController::class, 'secret']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
