<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\FlightController;

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

Route::get('/', [FlightController::class, 'index']);

Route::get('agencies/{agency}/flights/create', [AgencyController::class, 'createFlight']);
Route::post('agencies/{agency}/flights/create', [AgencyController::class, 'storeFlight']);
Route::resource('cities', CityController::class);
Route::resource('agencies', AgencyController::class);
Route::get('flights/{flight}/edit', [FlightController::class, 'delete']);
Route::put('flights/{flight}', [FlightController::class, 'update']);
/* Route::resource('flights', FlightController::class); */