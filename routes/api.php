<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\InventoryItemController;
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
Route::post( '/doctor/register', [UserController::class, 'storeDoc'] );
Route::post( '/login', [AuthController::class, 'login']);

Route::group( ['middleware' => ['auth:sanctum']], function () {
    Route::post( '/logout', [AuthController::class, 'logout'] );

    //NADA funciona el redireccionamiento cuando el usuario no esta logeado
    //En caso de utilizar postman se debe logear el usuario y copiar el token
    //y pegarlo en la autorizacion Bearer Token para cada request
    Route::get( '/users', [UserController::class, 'index'] );
    Route::put( '/user/{id}', [UserController::class, 'update'] );
    Route::delete( '/user/{id}', [UserController::class, 'destroy'] );

    Route::put( '/appointment', [AppointmentController::class, 'create'] );
    Route::get( '/appointments', [AppointmentController::class, 'index'] );
    Route::get( '/appointment/{id}', [AppointmentController::class, 'show'] );
    Route::put( '/appointment/{id}', [AppointmentController::class, 'update'] );
    Route::delete( '/appointment/{id}', [AppointmentController::class, 'destroy'] );

    Route::get( '/unavailability/{date}', [AppointmentController::class, 'unavailability'] );

    Route::get('/surveys', [SurveyController::class, 'index']);
    Route::get('/survey/{id}', [SurveyController::class, 'show']);
    Route::put('/survey/{id}', [SurveyController::class, 'update']);
    
    // Nuevas rutas para manejar tratamientos e insumos médicos
    Route::resource('treatments', TreatmentController::class);
    Route::resource('inventory', InventoryItemController::class);
});
