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

    $user =  Auth::user();
    if (isset($user)) {
        return view('home');
    }
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('superadmins/login', [App\Http\Controllers\Superadmins\SuperadminsLoginController::class, 'showLoginForm']);
Route::post('superadmins/login', [App\Http\Controllers\Superadmins\SuperadminsLoginController::class, 'login']);
Route::get('superadmins/area', [App\Http\Controllers\Superadmins\SuperadminsLoginController::class, 'secret']);
Route::get('/adminrecep/create', [App\Http\Controllers\Adminreceps\AdminrecepsCreateController::class, 'create'])->middleware('auth');
Route::post('/adminrecep/store', App\Http\Controllers\Adminreceps\AdminrecepsStoreController::class)->middleware('auth');
Route::get('/adminrecep', [App\Http\Controllers\Adminreceps\AdminrecepsIndexController::class, 'index'])->middleware('auth');
Route::get('/adminrecep/edit/{id}', [App\Http\Controllers\Adminreceps\AdminrecepsEditController::class, 'edit'])->middleware('auth');
Route::post('/adminrecep/update', [App\Http\Controllers\Adminreceps\AdminrecepsUpdateController::class, 'update'])->middleware('auth');
Route::post('/adminrecep/delete', [App\Http\Controllers\Adminreceps\AdminrecepsDeleteController::class, 'delete'])->middleware('auth');
Route::get('/role/create', [App\Http\Controllers\Roles\RolesCreateController::class, 'create'])->middleware('auth');
Route::post('/role/store', [App\Http\Controllers\Roles\RolesStoreController::class, 'store'])->middleware('auth');
Route::post('/role/edit', [App\Http\Controllers\Roles\RolesStoreController::class, 'store'])->middleware('auth');
Route::post('/rol/delete', [App\Http\Controllers\Roles\RolesStoreController::class, 'store'])->middleware('auth');
Route::get('/role', [App\Http\Controllers\Roles\RolesIndexController::class, 'index'])->middleware('auth');
/* PERMISSIONS */
Route::get('/permission/create', [App\Http\Controllers\Permissions\PermissionsCreateController::class, 'create'])->middleware('auth');
Route::post('/permission/store', [App\Http\Controllers\Permissions\PermissionsStoreController::class, 'store'])->middleware('auth');

/* Setting */
Route::get('/setting/create', [App\Http\Controllers\Settings\SettingsCreateController::class, 'create'])->middleware('auth');
Route::post('/setting/store', [App\Http\Controllers\Settings\SettingsStoreController::class, 'store'])->middleware('auth');
Route::get('/setting', [App\Http\Controllers\Settings\SettingsIndexController::class, 'index'])->middleware('auth');
Route::post('/setting/edit', [App\Http\Controllers\Settings\SettingsEditController::class, 'edit'])->middleware('auth');
Route::post('/setting/update', [App\Http\Controllers\Settings\SettingsUpdateController::class, 'update'])->middleware('auth');
Route::post('/setting/delete', [App\Http\Controllers\Settings\SettingsDeleteController::class, 'delete'])->middleware('auth');

/* Residents */
Route::get('/residents/create', [App\Http\Controllers\Residents\ResidentsCreateController::class, 'create'])->middleware('auth');
Route::post('/residents/store', [App\Http\Controllers\Residents\ResidentsStoreController::class, 'store'])->middleware('auth');
Route::get('/residents', [App\Http\Controllers\Residents\ResidentsIndexController::class, 'index'])->middleware('auth');
Route::post('/changeStatusResident', [App\Http\Controllers\Residents\ResidentsChangeStatusController::class, 'changeStatus'])->middleware('auth');
Route::get('/residents/edit/{id}', [App\Http\Controllers\Residents\ResidentsEditController::class, 'edit'])->middleware('auth');
Route::post('/residents/update', [App\Http\Controllers\Residents\ResidentsUpdateController::class, 'update'])->middleware('auth');
Route::post('/residents/delete', [App\Http\Controllers\Residents\ResidentsDeleteController::class, 'delete'])->middleware('auth');


/* Services */
Route::get('/services/create', [App\Http\Controllers\Services\ServicesCreateController::class, 'create'])->middleware('auth');
Route::post('/services/store', [App\Http\Controllers\Services\ServicesStoreController::class, 'store'])->middleware('auth');
Route::get('/services', [App\Http\Controllers\Services\ServicesIndexController::class, 'index'])->middleware('auth');
Route::post('/services/edit', [App\Http\Controllers\Services\ServicesEditController::class, 'edit'])->middleware('auth');
Route::post('/services/update', [App\Http\Controllers\Services\ServicesUpdateController::class, 'update'])->middleware('auth');
Route::post('/services/delete', [App\Http\Controllers\Services\ServicesDeleteController::class, 'delete'])->middleware('auth');

/* Booking */
Route::get('/bookings/create', [App\Http\Controllers\Bookings\BookingsCreateController::class, 'create'])->middleware('auth');
Route::post('/bookings/schedule', [App\Http\Controllers\Bookings\BookingsScheduleController::class, 'schedule'])->middleware('auth');
Route::post('/bookings/store', [App\Http\Controllers\Bookings\BookingsStoreController::class, 'store'])->middleware('auth');
Route::get('/bookings', [App\Http\Controllers\Bookings\BookingsIndexController::class, 'index'])->middleware('auth');
Route::get('/detailBooking/{service}', [App\Http\Controllers\Bookings\BookingsDetailBookingController::class, 'detailBooking'])->middleware('auth');
Route::post('/booking/cancel', [App\Http\Controllers\Bookings\BookingsCancelController::class, 'cancel'])->middleware('auth');
Route::post('/bookings/changeState', [App\Http\Controllers\Bookings\BookingsChangeStateController::class, 'changeState'])->middleware('auth');
Route::get('/bookings/changeState', [App\Http\Controllers\Bookings\BookingsChangeStateController::class, 'changeState'])->middleware('auth');


// Extra information
Route::get('/preinformation', [App\Http\Controllers\Extrainfo\PreinfoChangeStateController::class, 'preinfo'])->middleware('auth');
Route::post('/extrainfo/create', [App\Http\Controllers\Extrainfo\ExtrainfoCreateController::class, 'create'])->middleware('auth');
Route::post('/extrainfo/store', [App\Http\Controllers\Extrainfo\ExtrainfoStoreController::class, 'store'])->middleware('auth');
Route::get('/extrainfo/index/{id}', [App\Http\Controllers\Extrainfo\ExtrainfoIndexController::class, 'index'])->middleware('auth');

//Habitants
Route::get('/habitants/create/{id}', [App\Http\Controllers\Habitants\HabitantsCreateController::class, 'create'])->middleware('auth');
Route::post('/habitants/store', [App\Http\Controllers\Habitants\HabitantsStoreController::class, 'store'])->middleware('auth');
Route::get('/habitants/delete/{id}', [App\Http\Controllers\Habitants\HabitantsDeleteController::class, 'delete'])->middleware('auth');

//Transports
Route::get('/transports/create/{id}', [App\Http\Controllers\Transports\TransportsCreateController::class, 'create'])->middleware('auth');
Route::post('/transports/store', [App\Http\Controllers\Transports\TransportsStoreController::class, 'store'])->middleware('auth');
Route::get('/transports/delete/{id}', [App\Http\Controllers\Transports\TransportsDeleteController::class, 'delete'])->middleware('auth');

//Pets
Route::get('/pets/create/{id}', [App\Http\Controllers\Pets\PetsCreateController::class, 'create'])->middleware('auth');
Route::post('/pets/store', [App\Http\Controllers\Pets\PetsStoreController::class, 'store'])->middleware('auth');
Route::get('/pets/delete/{id}', [App\Http\Controllers\Pets\PetsDeleteController::class, 'delete'])->middleware('auth');

//Receptionists
Route::get('/receptionists/create', [App\Http\Controllers\Receptionists\ReceptionistsCreateController::class, 'create'])->middleware('auth');

//CHANGE PASSWORD
Route::get('/user/passwordEdit/{id}', [App\Http\Controllers\User\UserPasswordEditController::class, 'passwordEdit'])->middleware('auth');

Route::post('/changePassword', [App\Http\Controllers\User\UserChangePasswordController::class, 'changePassword'])->middleware('auth');
