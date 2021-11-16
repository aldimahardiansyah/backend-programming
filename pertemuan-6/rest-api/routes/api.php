<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/student', [StudentsController::class, 'index']);

    Route::post('/student', [StudentsController::class, 'store']);

    Route::get('/student/{id}', [StudentsController::class, 'show']);

    Route::put('/student/{id}', [StudentsController::class, 'update']);

    Route::delete('/student/{id}', [StudentsController::class, 'destroy']);
});

Route::post("/register", [AuthController::class, 'register']);

Route::post("/login", [AuthController::class, 'login']);
