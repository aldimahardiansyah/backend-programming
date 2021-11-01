<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use PHPUnit\Framework\MockObject\Builder\Stub;

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

Route::get('/student', [StudentsController::class, 'index']);
Route::post('/student', [StudentsController::class, 'store']);
Route::put('/student', [StudentsController::class, 'update']);
