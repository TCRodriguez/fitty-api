<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ClientWorkoutsController;
use App\Http\Controllers\ExerciseLogsController;
use App\Http\Controllers\ExercisesController;
use App\Http\Controllers\WorkoutsController;

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

// ClientWorkouts Routes
Route::get('/clients/{client}/workouts', [ClientWorkoutsController::class, 'index']);
Route::get('/clients/{client}/workouts/{workout}', [ClientWorkoutsController::class, 'show']);
Route::post('/clients/{client}/workouts', [ClientWorkoutsController::class, 'store']);
Route::put('/clients/{client}/workouts/{workout}', [ClientWorkoutsController::class, 'update']);
Route::delete('/clients/{client}/workouts/{workout}', [ClientWorkoutsController::class, 'destroy']);

// Add an ExerciseLog to a ClientWorkout
// ?? A different way to add an ExerciseLog to a Workout? How does this work?
Route::post('/clients/{client}/workouts/{workout}/logs', [ClientsController::class, 'update']);

// // Workouts Routes
// Route::get('/workouts', [WorkoutsController::class, 'index']);
// Route::get('/workouts/{workout}', [WorkoutsController::class, 'show']);
// Route::post('/workouts', [WorkoutsController::class, 'store']);
// Route::put('/workouts/{workout}', [WorkoutsController::class, 'update']);
// Route::delete('/workouts/{workout}', [WorkoutsController::class, 'destroy']);

// ExerciseLog routes
Route::get('/clients/{client}/workouts/{workout}/exercise-logs', [ExerciseLogsController::class, 'index']);
Route::get('/clients/{client}/workouts/{workout}/exercise-logs/{exercise_log}', [ExerciseLogsController::class, 'show']);
Route::post('/clients/{client}/workouts/{workout}/exercise-logs/', [ExerciseLogsController::class, 'store']);
Route::put('/clients/{client}/workouts/{workout}/exercise-logs/{exercise_log}', [ExerciseLogsController::class, 'update']);
Route::delete('/workouts/{workout}/exercise-logs/{exercise_log}', [ExerciseLogsController::class, 'destroy']);

// Exercises routes
Route::get('/exercises', [ExercisesController::class, 'index']);
Route::post('/exercises', [ExercisesController::class, 'store']);
Route::put('/exercises/{exercise}', [ExercisesController::class, 'update']);
Route::delete('/exercises/{exercise}', [ExercisesController::class, 'destroy']);

// Route::get('/exercises/{exercise}/logs', [ExerciseLogsController::class, 'index']);
// Route::get('/exercises/{exercise}/logs/{log}', [ExerciseLogsController::class, 'show']);
// Route::post('/exercises/{exercise}/logs', [ExerciseLogsController::class, 'store']);
// Route::put('/exercises/{exercise}/logs/{log}', [ExerciseLogsController::class, 'update']);
// Route::delete('/exercises/{exercise}/logs/{log}', [ExerciseLogsController::class, 'destroy']);

// Route::get('/clients/{client}/logs', [ClientLogsController::class, 'show']);
// Route::post('/clients/{client}/logs/{log}', [ClientLogsController::class, 'store']);
