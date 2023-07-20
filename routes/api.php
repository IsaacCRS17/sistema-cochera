<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vehicle_typeController;
use App\Http\Controllers\vehicleController;
use App\Http\Controllers\personaController;
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

Route::apiResource('personas', personaController::class);
Route::apiResource('vehicle_type', vehicle_typeController::class);
Route::apiResource('vehicle', vehicleController::class);
