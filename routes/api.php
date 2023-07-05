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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/vehicle_type', 'App\Http\Controllers\vehicle_typeController@index'); //list
Route::post('/vehicle_type', 'App\Http\Controllers\vehicle_typeController@store'); //add
Route::put('/vehicle_type/{id}', 'App\Http\Controllers\vehicle_typeController@update'); //update
Route::delete('/vehicle_type/{id}', 'App\Http\Controllers\vehicle_typeController@destroy'); //update
