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
Route::post('/parking-space-update', App\Http\Controllers\ParkingSpaces\UpdateParkingSpacesController::class)->name('parkingSpaces.update');
Route::post('/parking-space-store', App\Http\Controllers\ParkingSpaces\StoreParkingSpacesController::class)->name('parkingSpaces.store');

// Roles
Route::post('/role-store', App\Http\Controllers\Roles\StoreRolesController::class)->name('roles.store');
Route::get('/get-all-roles', App\Http\Controllers\Roles\GetAllRolesController::class)->name('roles.getAll');
Route::get('/get-role-register/{id}', App\Http\Controllers\Roles\GetRegisterRolesController::class)->name('roles.getRegister');
Route::post('/role-update', App\Http\Controllers\Roles\UpdateRolesController::class)->name('roles.update');
Route::get('/get-all-and-assigned-permissions/{id}', App\Http\Controllers\Roles\GetAllAndAssignedPermissionsRolesController::class)->name('roles.getAllAndAssignedPermissions');
Route::post('/save-permission-assignments', App\Http\Controllers\Roles\SavePermissionAssignmentsRolesController::class)->name('roles.savePermissionAssignments');

// Permissions
Route::get('/get-all-permissions', App\Http\Controllers\Permissions\GetAllPermissionsController::class)->name('permissions.getAll');
Route::post('/permission-store', App\Http\Controllers\Permissions\StorePermissionsController::class)->name('permissions.store');
Route::get('/get-permission-register/{id}', App\Http\Controllers\Permissions\GetRegisterPermissionsController::class)->name('permissions.getRegister');
Route::post('/permission-update', App\Http\Controllers\Permissions\UpdatePermissionsController::class)->name('permissions.update');
Route::post('/save-role-assignments', App\Http\Controllers\Permissions\SaveRoleAssignmentsPermissionsController::class)->name('permissions.saveRoleAssignments');

// Residents
Route::get('/get-all-residents', App\Http\Controllers\Residents\GetAllResidentsController::class)->name('residents.getAll');

// Detail space occupations
Route::post('/store-detail-space-occupation', App\Http\Controllers\DetailSpaceOccupations\StoreDetailSpaceOccupationsController::class)->name('detailSpaceOccupations.store');
Route::post('/update-detail-space-occupation', App\Http\Controllers\DetailSpaceOccupations\UpdateDetailSpaceOccupationsController::class)->name('detailSpaceOccupations.update');








