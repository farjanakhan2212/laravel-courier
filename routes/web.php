<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\http\Controllers\Inventory\ProductController;

use App\http\Controllers\Courier\CourierBranchController;
use App\http\Controllers\Courier\CourierReceiverController;
use App\http\Controllers\Courier\CourierShipmentController;
use App\http\Controllers\Courier\CourierVehicleController;
use App\http\Controllers\Courier\CourierVehicleTypeController;
use App\http\Controllers\Courier\CourierInvoiceController;
use App\http\Controllers\Courier\PersonController;
use App\http\Controllers\Courier\CourierParcelController;
use App\http\Controllers\Parcel\CourierSenderController;
use App\http\Controllers\Courier\CourierTypeController;
use App\http\Controllers\Courier\CourierParcelStatusController;
use App\http\Controllers\Courier\CourierParcelHistoryController;







//public pages
Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'showRegister'])->middleware('guest')->name('register');
    Route::post('register', [AuthController::class, 'register'])->middleware('guest');
    Route::post('login', [AuthController::class, 'login'])->middleware('guest');

    Route::get('login', function () {
        return view("auth.login");
    })->name('login');
});




// private pages
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard.home');
    });
    Route::get('dashboard', function () {
        return view('pages.dashboard.home');
    })->name('dashboard');

    //CRUD route

    Route::get('/products/{id}/delete', [ProductController::class, 'delete']);
    Route::resource('products', controller: ProductController::class);

    Route::get('/senders/{id}/delete', [CourierSenderController::class, 'delete']);
    Route::resource('senders', controller: CourierSenderController::class);

    Route::get('/parcels/{id}/delete', [CourierParcelController::class, 'delete']);
    Route::resource('parcels', controller: CourierParcelController::class);

    Route::get('/persons/{id}/delete', [PersonController::class, 'delete']);
    Route::resource('persons', controller: PersonController::class);

    Route::get('/types/{id}/delete', [CourierTypeController::class, 'delete']);
    Route::resource('types', controller: CourierTypeController::class);

    Route::get('/branches/{id}/delete', [CourierBranchController::class, 'delete']);
    Route::resource('branches', controller: CourierBranchController::class);

    Route::get('/receivers/{id}/delete', [CourierReceiverController::class, 'delete']);
    Route::resource('receivers', controller: CourierReceiverController::class);

    Route::get('/vehicles/{id}/delete', [CourierVehicleController::class, 'delete']);
    Route::resource('vehicles', controller: CourierVehicleController::class);

    Route::get('/shipments/{id}/delete', [CourierShipmentController::class, 'delete']);
    Route::resource('shipments', controller: CourierShipmentController::class);

    Route::get('/vehicletypes/{id}/delete', [CourierVehicleTypeController::class, 'delete']);
    Route::resource('vehicletypes', controller: CourierVehicleTypeController::class);

    Route::get('/invoices/{id}/delete', [CourierInvoiceController::class, 'delete']);
    Route::resource('invoices', controller: CourierInvoiceController::class);

    Route::get('/statuses/{id}/delete', [CourierParcelStatusController::class, 'delete']);
    Route::resource('statuses', controller: CourierParcelStatusController::class);

    Route::get('/history/{id}/delete', [CourierParcelHistoryController::class, 'delete']);
    Route::resource('history', controller: CourierParcelHistoryController::class);



    //Dashboard

    Route::get('home', function () {
        return view('pages.dashboard.home');
    });

    Route::get('summary', function () {
        return view('pages.dashboard.summary');
    });

    //parcel registration
    Route::get('create_registration', function () {
        return view('pages.courier.parcel.create');
    });

    Route::get('manage_registration', function () {
        return view('pages.courier.parcel.index');
    });


    //sender

    Route::get('create_sender', function () {
        return view('pages.courier.sender.create');
    });

    Route::get('manage_sender', function () {
        return view('pages.courier.sender.index');
    });

    //invoice

    Route::get('create_invoice', function () {
        return view('pages.courier.invoice.create');
    });
    Route::get('manage_invoice', function () {
        return view('pages.courier.invoice.index');
    });


    //shipment

    Route::get('create_shipment', function () {
        return view('pages.courier.shipment.create');
    });

    Route::get('manage_shipment', function () {
        return view('pages.courier.shipment.index');
    });

    //Branch

    Route::get('create_branch', function () {
        return view('pages.courier.branch.create');
    });

    Route::get('manage_branch', function () {
        return view('pages.courier.branch.index');
    });

    //vehicle


    Route::get('create_vehicle', function () {
        return view('pages.courier.vehicle.create');
    });

    Route::get('manage_vehicle', function () {
        return view('pages.courier.vehicle.index');
    });

    Route::get('create_vehicle_type', function () {
        return view('pages.courier.vehicle type.create');
    });

    Route::get('manage_vehicle_type', function () {
        return view('pages.courier.vehicle type.index');
    });

    //receiver


    Route::get('create_receiver', function () {
        return view('pages.courier.receiver.create');
    });

    Route::get('manage_receiver', function () {
        return view('pages.courier.receiver.index');
    });


    Route::get('create_person', function () {
        return view('pages.courier.person.create');
    });

    Route::get('manage_person', function () {
        return view('pages.courier.person.index');
    });

    Route::get('create_type', function () {
        return view('pages.courier.courier type.create');
    });

    Route::get('manage_type', function () {
        return view('pages.courier.courier type.index');
    });

    Route::get('create_person', function () {
        return view('pages.courier.person.create');
    });

    Route::get('manage_person', function () {
        return view('pages.courier.person.index');
    });

    Route::get('status', function () {
        return view('pages.courier.status.create');
    });


    Route::get('manage_status', function () {
        return view('pages.courier.status.index');
    });


    Route::get('manage_history', function () {
        return view('pages.courier.history.index');
    });

    Route::get('history/create', function () {
        return view('pages.courier.history.create');
    });

    // Authentication
    // About Us
    Route::get('about', function () {
        return view('about');
    });

    // Route::get('/dashboard', function () {
    //     //return 'Welcome ' . auth()->user()->name;
    //     return view("/dashboard",["user"=>auth()->user()->name()]);
    // });
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
