<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/get-certain-payments', App\Http\Controllers\Payments\GetCertainPaymentsController::class)->name('payments.get-certain');


// Parkings
Route::post('/parking-store', App\Http\Controllers\Parkings\StoreParkingsController::class)->name('parkings.store');
Route::get('/parkings-get-all', App\Http\Controllers\Parkings\GetAllParkingsController::class)->name('parkings.get-all');
Route::get('/parkings-edit/{id}', App\Http\Controllers\Parkings\EditParkingsController::class);
Route::post('/parking-store', App\Http\Controllers\Parkings\StoreParkingsController::class)->name('parkings.store');
Route::post('/parking-update', App\Http\Controllers\Parkings\UpdateParkingsController::class)->name('parkings.update');

//Parking spaces
Route::get('/get-parking-spaces/{id}', App\Http\Controllers\ParkingSpaces\GetByParkingIDParkingSpacesController::class)->name('parkingSpaces.getByParkingID');
Route::get('/changeEnabled/{id}/{value}', App\Http\Controllers\ParkingSpaces\ChangeEnabledParkingSpacesController::class)->name('parkingSpaces.changeEnabled');
Route::get('/changeStatus/{id}/{value}', App\Http\Controllers\ParkingSpaces\ChangeStatusParkingSpacesController::class)->name('parkingSpaces.changeStatus');
Route::get('/parking-space-edit/{id}', App\Http\Controllers\ParkingSpaces\EditParkingSpacesController::class);


