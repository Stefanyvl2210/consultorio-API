<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppointmentController;
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

Route::post( '/register', [UserController::class, 'store'] );
Route::post( '/login', [AuthController::class, 'login'] );


Route::put( '/appointment/{date}/{time}', [AppointmentController::class, 'create'] );

Route::middleware(['auth', 'sanctum'])->group(function () {
    Route::post( '/logout', [AuthController::class, 'logout'] );

    Route::get( '/users', [UserController::class, 'index'] );
    Route::put( '/user/{id}', [UserController::class, 'update'] );
    Route::delete( '/user/{id}', [UserController::class, 'destroy'] );
});
