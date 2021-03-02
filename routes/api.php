<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Client routes
Route::get('/clients', [ClientsController::class, 'index']);
Route::get('/clients/{client}', [ClientsController::class, 'show']);
Route::post('/clients', [ClientsController::class, 'store']);
Route::put('/clients/{client}', [ClientsController::class, 'update']);
Route::delete('/clients/{client}', [ClientsController::class, 'destroy']);

// Route::get('/clients/{client}/logs', [ClientLogsController::class, 'show']);
// Route::post('/clients/{client}/logs/{log}', [ClientLogsController::class, 'store']);
