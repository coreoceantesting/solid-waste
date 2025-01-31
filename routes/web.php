<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('/');

// Route::get('/form16', function () {
//     return view('form16');
// });

// Guest Users
Route::middleware(['guest', 'PreventBackHistory', 'firewall.all'])->group(function () {
    Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('signin');
    Route::get('register', [App\Http\Controllers\Admin\AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [App\Http\Controllers\Admin\AuthController::class, 'register'])->name('signup');
});



// Authenticated users
Route::middleware(['auth', 'PreventBackHistory', 'firewall.all'])->group(function () {

    Route::get('/form16', function () {
        return view('form16');
    });


    // Route::get('/form17', function () {
    //     return view('admin/masters/form17');
    // });

    Route::get('/collectionCenter', function () {
        return view('admin/masters/collectionCenter');
    });

    Route::get('/load.waste.items', function () {
        return view('admin/masters/load.waste.items');
    });
    // Auth Routes
    Route::get('home', fn () => redirect()->route('dashboard'))->name('home');
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [App\Http\Controllers\Admin\AuthController::class, 'Logout'])->name('logout');
    Route::get('change-theme-mode', [App\Http\Controllers\Admin\DashboardController::class, 'changeThemeMode'])->name('change-theme-mode');
    Route::get('show-change-password', [App\Http\Controllers\Admin\AuthController::class, 'showChangePassword'])->name('show-change-password');
    Route::post('change-password', [App\Http\Controllers\Admin\AuthController::class, 'changePassword'])->name('change-password');



    // Masters
    Route::resource('wards', App\Http\Controllers\Admin\Masters\WardController::class);

    Route::resource('area-type', App\Http\Controllers\Admin\Masters\AreaTypeController::class);

    Route::resource('collection-type', App\Http\Controllers\Admin\Masters\CollectionTypeController::class);

    Route::resource('collection-transport', App\Http\Controllers\Admin\Masters\CollectionTransportController::class);

    Route::resource('census-years', App\Http\Controllers\Admin\Masters\CenusyearsController::class);

    Route::resource('types-of-fine-charges', App\Http\Controllers\Admin\Masters\TypesOfFineChargesController::class);


    Route::resource('inspection-type', App\Http\Controllers\Admin\Masters\InspectionTypesController::class);

    Route::resource('locality-service-type', App\Http\Controllers\Admin\Masters\LocalityServiceTypeController::class);

    Route::resource('maintenance-type', App\Http\Controllers\Admin\Masters\MaintenanceTypesController::class);

    Route::resource('pump-type', App\Http\Controllers\Admin\Masters\PumpTypeController::class);


    Route::resource('shift-timings', App\Http\Controllers\Admin\Masters\ShiftTimingsController::class);

    Route::resource('types-of-item-solds', App\Http\Controllers\Admin\Masters\TypesOfItemSoldController::class);

    Route::resource('vehicle-type', App\Http\Controllers\Admin\Masters\VehicleTypeController::class);

    Route::resource('vehicles', App\Http\Controllers\Admin\Masters\VehiclesController::class);

    Route::resource('mainprefix', App\Http\Controllers\Admin\Masters\Prefix\MainPrefixController::class);

    Route::resource('prefix', App\Http\Controllers\Admin\Masters\Prefix\PrefixController::class);

    Route::resource('prefix-details', App\Http\Controllers\Admin\Masters\Prefix\PrefixDetailsController::class);

    Route::resource('collection-centers', App\Http\Controllers\Admin\Masters\CollectionCenterController::class);

    Route::resource('slrm-employee-details', App\Http\Controllers\Admin\Masters\SlrmEmployeeDetailController::class);

    Route::resource('designations', App\Http\Controllers\Admin\Masters\DesignationController::class);

    Route::resource('population', App\Http\Controllers\Admin\Masters\PopulationController::class);

    Route::get('vehicle-scheduling-information/getVehicalDetails/{id}', [App\Http\Controllers\Admin\Masters\VehicleSchedulingInformationController::class, 'getVehicalDetails'])->name('vehicle-scheduling-information.get-vehical-number');
    Route::resource('vehicle-scheduling-information', App\Http\Controllers\Admin\Masters\VehicleSchedulingInformationController::class);

    Route::resource('contract-mapping', App\Http\Controllers\Admin\Masters\ContractMappingController::class);

    Route::resource('waste-details', App\Http\Controllers\Admin\Masters\WasteDetailsController::class);

    Route::resource('trip-sheet', App\Http\Controllers\Admin\Masters\TripSheetController::class);

    Route::resource('vehicle-target', App\Http\Controllers\Admin\Masters\VehicleTargetController::class);

    Route::resource('form17', App\Http\Controllers\Admin\Masters\form17controller::class);


    // Route::resource('load.waste.items', App\Http\Controllers\Admin\Masters\DesignationController::class);
    // Route::post('/store', [SlrmEmployeeDetailController::class, 'store']);

    // Users Roles n Permissions
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::get('users/{user}/toggle', [App\Http\Controllers\Admin\UserController::class, 'toggle'])->name('users.toggle');
    Route::get('users/{user}/retire', [App\Http\Controllers\Admin\UserController::class, 'retire'])->name('users.retire');
    Route::put('users/{user}/change-password', [App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name('users.change-password');
    Route::get('users/{user}/get-role', [App\Http\Controllers\Admin\UserController::class, 'getRole'])->name('users.get-role');
    Route::put('users/{user}/assign-role', [App\Http\Controllers\Admin\UserController::class, 'assignRole'])->name('users.assign-role');
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    // Route::get('vehicles/{waste_id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
    // Route::get('vehicles/{waste_id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');

    // route for report
    Route::get('reports/collection-scheduling-report', [App\Http\Controllers\Admin\ReportsController::class, 'collectionSchedulingReport'])->name('report.collection-scheduling-report');

    Route::get('reports/trip-sheet-report', [App\Http\Controllers\Admin\ReportsController::class, 'TripSheetReport'])->name('report.trip-sheet-report');

    Route::get('reports/waste-details-report', [App\Http\Controllers\Admin\ReportsController::class, 'WasteDetailsReport'])->name('report.waste-details-report');

    Route::get('reports/vehicle-target-report', [App\Http\Controllers\Admin\ReportsController::class, 'VehicleTargetReport'])->name('report.vehicle-target-report');


});




Route::get('/php', function (Request $request) {
    if (!auth()->check())
        return 'Unauthorized request';

    Artisan::call($request->artisan);
    return dd(Artisan::output());
});
