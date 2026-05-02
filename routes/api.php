<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Courier\CourierParcelController;
use App\Http\Controllers\Api\Courier\CourierParcelStatusController;
use App\Http\Controllers\Api\CourierInvoiceController;
use App\Http\Controllers\Api\Courier\CourierTypeController;
use App\Http\Controllers\Api\Courier\CourierBranchController;
use App\Http\Controllers\Api\Courier\CourierParcelHistoryController;
use App\Http\Controllers\Api\Courier\CourierReceiverController;
use App\Http\Controllers\Api\Courier\CourierSenderController;
use App\Http\Controllers\Api\Courier\CourierVehicleController;
use App\Http\Controllers\Api\Courier\CourierVehicleTypeController;
use App\Http\Controllers\Api\Courier\CourierShipmentController;
use App\Http\Controllers\Api\Courier\PersonController;
use App\Http\Controllers\Api\CompanyController;






Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('statuses',[CourierParcelStatusController::class,'index']);
Route::post('statuses',[CourierParcelStatusController::class,'store']);

Route::apiResources([
    'parcels'=>CourierParcelController::class,
    'invoice'=>CourierInvoiceController::class,
    'types'=>CourierTypeController::class,
    'histories'=>CourierParcelHistoryController::class,
    'receivers'=>CourierReceiverController::class,
    'senders'=>CourierSenderController::class,
    'vehicles'=>CourierVehicleController::class,
    'vehicletypes'=>CourierVehicleTypeController::class,
    'shipments'=>CourierShipmentController::class,
    'persons'=>PersonController::class,
    'branches'=>CourierBranchController::class,
    'branches'=>CourierParcelStatusController::class,
    'companies'=>CompanyController::class,


]);

