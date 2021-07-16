<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------♥
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
Route::get('superadmins/login', [App\Http\Controllers\Superadmins\SuperadminsLoginController::class, 'showLoginForm']);
Route::post('superadmins/login', [App\Http\Controllers\Superadmins\SuperadminsLoginController::class, 'login']);
Route::get('superadmins/area', [App\Http\Controllers\Superadmins\SuperadminsLoginController::class, 'secret']);
Route::get('/adminrecep/create', [App\Http\Controllers\Adminreceps\AdminrecepsCreateController::class, 'create'])->middleware('auth');
Route::post('/adminrecep/store', App\Http\Controllers\Adminreceps\AdminrecepsStoreController::class)->middleware('auth');
Route::get('/adminrecep', [App\Http\Controllers\Adminreceps\AdminrecepsIndexController::class, 'index'])->middleware('auth');
Route::post('/adminrecep/edit', [App\Http\Controllers\Adminreceps\AdminrecepsEditController::class, 'edit'])->middleware('auth');
Route::post('/adminrecep/update', [App\Http\Controllers\Adminreceps\AdminrecepsUpdateController::class, 'update'])->middleware('auth');
Route::post('/adminrecep/delete', [App\Http\Controllers\Adminreceps\AdminrecepsDeleteController::class, 'delete'])->middleware('auth');
Route::get('/role/create', [App\Http\Controllers\Roles\RolesCreateController::class, 'create'])->middleware('auth');
Route::post('/role/store', [App\Http\Controllers\Roles\RolesStoreController::class, 'store'])->middleware('auth');
