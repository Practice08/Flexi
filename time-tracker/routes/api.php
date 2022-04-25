<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;


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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/choosemployee', [EmployeeController::class, 'authUsers']);
    Route::get('/chosenemployee', [EmployeeController::class, 'showAuthUsers']);
    Route::post('/start-timer-user', [EmployeeController::class, 'startTimerOfAnotherUser']);
    Route::post('/start-timer', [EmployeeController::class, 'updateCurrent']);
    Route::post('/absence-reason', [EmployeeController::class, 'absenceReason']);
    Route::get('/show-work-time', [EmployeeController::class, 'showWorkTime']);
    Route::get('/total-work-time', [EmployeeController::class, 'totalWorkedHours']);
});
