<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\DriverRegistrationController;
use App\Http\Controllers\Api\GuarantorController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegistrationController;
use App\Http\Controllers\Api\SponsorRegistrationController;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\VehicleController;
use App\Http\Controllers\DriverController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegistrationController::class, 'store']);

Route::post('login', [LoginController::class, 'store']);

Route::post('logout', [LoginController::class, 'logout'])->middleware(
    'auth:sanctum'
);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('sponsor_basic_data', [
        SponsorRegistrationController::class,
        'basic_data',
    ]);
    Route::post('sponsor_bank_details', [
        SponsorRegistrationController::class,
        'bank_details',
    ]);

    Route::post('add_sponsor', [SponsorRegistrationController::class, 'store']);

    Route::post('driver_basic_data', [
        DriverRegistrationController::class,
        'basic_data',
    ]);

    Route::post('driver_education_data', [
        DriverRegistrationController::class,
        'driver_education_data',
    ]);

    Route::post('driver_relative_data', [
        DriverRegistrationController::class,
        'driver_relative_data',
    ]);

    Route::post('company_data', [
        DriverRegistrationController::class,
        'company_data',
    ]);

    Route::post('driver_bank_data', [
        DriverRegistrationController::class,
        'driver_bank_data',
    ]);

    Route::post('register_driver', [
        DriverRegistrationController::class,
        'store',
    ]);

    Route::post('guarantor1_basic_data', [
        GuarantorController::class,
        'store_guarantor1',
    ]);

    Route::post('guarantor2_basic_data', [
        GuarantorController::class,
        'store_guarantor2',
    ]);

    Route::post('guarantor1_contact_data', [
        GuarantorController::class,
        'store_contact_data1',
    ]);

    Route::post('guarantor2_contact_data', [
        GuarantorController::class,
        'store_contact_data2',
    ]);

    Route::post('guarantor1_work_data', [
        GuarantorController::class,
        'guarantor1_work_data',
    ]);

    Route::post('guarantor2_work_data', [
        GuarantorController::class,
        'guarantor2_work_data',
    ]);

    Route::post('guarantor1_nin_upload', [
        GuarantorController::class,
        'guarantor1_nin_upload',
    ]);

    Route::post('register_guarantor1', [
        GuarantorController::class,
        'register_guarantor1',
    ]);

    Route::post('register_guarantor2', [
        GuarantorController::class,
        'register_guarantor2',
    ]);

    Route::get('guarantors', [GuarantorController::class, 'index']);

    Route::get('sponsors', [SponsorRegistrationController::class, 'index']);

    Route::get('drivers', [DriverRegistrationController::class, 'index']);

    Route::put('edit_name/{id}', [AdminController::class, 'editname']);

    Route::put('edit_email/{id}', [AdminController::class, 'editemail']);

    Route::post('register_vehicle', [VehicleController::class, 'store']);

    Route::get('vehicles', [VehicleController::class, 'index']);

    Route::delete('delete_vehicle/{id}', [VehicleController::class, 'destroy']);

    Route::put('update_vehicle/{id}', [VehicleController::class, 'update']);

    Route::post('update_avatar', [AdminController::class, 'updateAvatar']);

    Route::get('driver/{id}', [DriverRegistrationController::class, 'show']);

    Route::get('sponsor/{id}', [SponsorRegistrationController::class, 'show']);


});

// Route::get('cars', [AdminController::class, 'cars']);

Route::post('store_cars', [AdminController::class, 'store_cars']);

Route::get('states', [StateController::class, 'index']);
