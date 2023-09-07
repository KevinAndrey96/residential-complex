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
Route::group(['middleware' => ['auth', 'isUserDeleted']], static function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('superadmins/login', [App\Http\Controllers\Superadmins\SuperadminsLoginController::class, 'showLoginForm']);
    Route::post('superadmins/login', [App\Http\Controllers\Superadmins\SuperadminsLoginController::class, 'login']);
    Route::get('superadmins/area', [App\Http\Controllers\Superadmins\SuperadminsLoginController::class, 'secret']);
    Route::get('/adminrecep/create', [App\Http\Controllers\Adminreceps\AdminrecepsCreateController::class, 'create']);
    Route::post('/adminrecep/store', App\Http\Controllers\Adminreceps\AdminrecepsStoreController::class);
    Route::get('/adminrecep', [App\Http\Controllers\Adminreceps\AdminrecepsIndexController::class, 'index']);
    Route::get('/adminrecep/edit/{id}', [App\Http\Controllers\Adminreceps\AdminrecepsEditController::class, 'edit']);
    Route::post('/adminrecep/update', [App\Http\Controllers\Adminreceps\AdminrecepsUpdateController::class, 'update']);
    Route::post('/adminrecep/delete', [App\Http\Controllers\Adminreceps\AdminrecepsDeleteController::class, 'delete']);
    Route::get('/role/create', [App\Http\Controllers\Roles\RolesCreateController::class, 'create']);
    Route::post('/role/store', [App\Http\Controllers\Roles\RolesStoreController::class, 'store']);
    Route::post('/role/edit', [App\Http\Controllers\Roles\RolesStoreController::class, 'store']);
    Route::post('/rol/delete', [App\Http\Controllers\Roles\RolesStoreController::class, 'store']);
    Route::get('/role', [App\Http\Controllers\Roles\RolesIndexController::class, 'index']);
    /* PERMISSIONS */
    Route::get('/permission/create', [App\Http\Controllers\Permissions\PermissionsCreateController::class, 'create']);
    Route::post('/permission/store', [App\Http\Controllers\Permissions\PermissionsStoreController::class, 'store']);

    /* Setting */
    Route::get('/setting/create', [App\Http\Controllers\Settings\SettingsCreateController::class, 'create']);
    Route::post('/setting/store', [App\Http\Controllers\Settings\SettingsStoreController::class, 'store']);
    Route::get('/setting', [App\Http\Controllers\Settings\SettingsIndexController::class, 'index'])->name('setting.index');
    Route::post('/setting/edit', [App\Http\Controllers\Settings\SettingsEditController::class, 'edit']);
    Route::post('/setting/update', [App\Http\Controllers\Settings\SettingsUpdateController::class, 'update']);
    Route::post('/setting/delete', [App\Http\Controllers\Settings\SettingsDeleteController::class, 'delete']);

    /* Residents */
    Route::get('/residents/create', [App\Http\Controllers\Residents\ResidentsCreateController::class, 'create']);
    Route::post('/residents/store', [App\Http\Controllers\Residents\ResidentsStoreController::class, 'store']);
    Route::get('/residents', [App\Http\Controllers\Residents\ResidentsIndexController::class, 'index']);
    Route::post('/changeStatusResident', [App\Http\Controllers\Residents\ResidentsChangeStatusController::class, 'changeStatus']);
    Route::get('/residents/edit/{id}', [App\Http\Controllers\Residents\ResidentsEditController::class, 'edit']);
    Route::post('/residents/update', [App\Http\Controllers\Residents\ResidentsUpdateController::class, 'update']);
    Route::post('/residents/delete', [App\Http\Controllers\Residents\ResidentsDeleteController::class, 'delete']);

    /* Services */
    Route::get('/services/create', [App\Http\Controllers\Services\ServicesCreateController::class, 'create']);
    Route::post('/services/store', [App\Http\Controllers\Services\ServicesStoreController::class, 'store']);
    Route::get('/services', [App\Http\Controllers\Services\ServicesIndexController::class, 'index']);
    Route::post('/services/edit', [App\Http\Controllers\Services\ServicesEditController::class, 'edit']);
    Route::post('/services/update', [App\Http\Controllers\Services\ServicesUpdateController::class, 'update']);
    Route::post('/services/delete', [App\Http\Controllers\Services\ServicesDeleteController::class, 'delete']);

    /* Booking */
    Route::get('/bookings/create', [App\Http\Controllers\Bookings\BookingsCreateController::class, 'create']);
    Route::post('/bookings/schedule', [App\Http\Controllers\Bookings\BookingsScheduleController::class, 'schedule']);
    Route::post('/bookings/store', [App\Http\Controllers\Bookings\BookingsStoreController::class, 'store']);
    Route::get('/bookings', [App\Http\Controllers\Bookings\BookingsIndexController::class, 'index']);
    Route::get('/detailBooking/{service}', [App\Http\Controllers\Bookings\BookingsDetailBookingController::class, 'detailBooking']);
    Route::post('/booking/cancel', [App\Http\Controllers\Bookings\BookingsCancelController::class, 'cancel']);
    Route::post('/bookings/changeState', [App\Http\Controllers\Bookings\BookingsChangeStateController::class, 'changeState']);
    Route::get('/bookings/changeState', [App\Http\Controllers\Bookings\BookingsChangeStateController::class, 'changeState']);

// Extra information
    Route::get('/preinformation', [App\Http\Controllers\Extrainfo\PreinfoChangeStateController::class, 'preinfo']);
    Route::post('/extrainfo/create', [App\Http\Controllers\Extrainfo\ExtrainfoCreateController::class, 'create']);
    Route::post('/extrainfo/store', [App\Http\Controllers\Extrainfo\ExtrainfoStoreController::class, 'store']);
    Route::get('/extrainfo/index/{id}', [App\Http\Controllers\Extrainfo\ExtrainfoIndexController::class, 'index']);

//Habitants
    Route::get('/habitants/create/{id}', [App\Http\Controllers\Habitants\HabitantsCreateController::class, 'create']);
    Route::post('/habitants/store', [App\Http\Controllers\Habitants\HabitantsStoreController::class, 'store']);
    Route::get('/habitants/delete/{id}', [App\Http\Controllers\Habitants\HabitantsDeleteController::class, 'delete']);

//Transports
    Route::get('/transports/create/{id}', [App\Http\Controllers\Transports\TransportsCreateController::class, 'create']);
    Route::post('/transports/store', [App\Http\Controllers\Transports\TransportsStoreController::class, 'store']);
    Route::get('/transports/delete/{id}', [App\Http\Controllers\Transports\TransportsDeleteController::class, 'delete']);

//Pets
    Route::get('/pets/create/{id}', [App\Http\Controllers\Pets\PetsCreateController::class, 'create']);
    Route::post('/pets/store', [App\Http\Controllers\Pets\PetsStoreController::class, 'store']);
    Route::get('/pets/delete/{id}', [App\Http\Controllers\Pets\PetsDeleteController::class, 'delete']);

//Receptionists
    Route::get('/receptionists/create', [App\Http\Controllers\Receptionists\ReceptionistsCreateController::class, 'create']);

//CHANGE PASSWORD
    Route::get('/user/passwordEdit/{id}', [App\Http\Controllers\User\UserPasswordEditController::class, 'passwordEdit']);
    Route::post('/changePassword', [App\Http\Controllers\User\UserChangePasswordController::class, 'changePassword']);

//update booking states
    Route::get('/updateBookingStates', [App\Http\Controllers\Bookings\BookingsUpdateStatesController::class, 'updateStates']);

    //Payments
    Route::get('/payments', App\Http\Controllers\Payments\IndexPaymentsController::class)->name('payments.index');
    Route::get('/payments-create', App\Http\Controllers\Payments\CreatePaymentsController::class)->name('payments.create');
    Route::post('/payments-store', App\Http\Controllers\Payments\StorePaymentsController::class)->name('payments.store');

});
