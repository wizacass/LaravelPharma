<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RegistersController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::resource('/positions', PositionController::class);
Route::resource('/employees', EmployeeController::class);
Route::resource('/medicaments', MedicamentController::class);
Route::resource('/pharmacies', PharmacyController::class);
Route::post('/pharmacies/{id}/assign', [PharmacyController::class, 'assign']);
Route::delete('/pharmacies/{id}/assign', [PharmacyController::class, 'unassign']);
Route::post('/pharmacies/{id}/registers', [RegistersController::class, 'createRegister']);
Route::delete('/pharmacies/{id}/registers', [RegistersController::class, 'destroyRegister']);
Route::get('/pharmacies/{id}/order', [OrdersController::class, 'show']);
Route::post('/pharmacies/{id}/order', [OrdersController::class, 'order']);

Auth::routes();
