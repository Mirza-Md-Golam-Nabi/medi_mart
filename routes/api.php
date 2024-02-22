<?php

use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Api\Auth\RegisteredUserController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\DivisionController;
use App\Http\Controllers\Api\ThanaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth:api');

Route::get('divisions', [DivisionController::class, 'index']);
Route::get('districts/{division}', [DistrictController::class, 'index']);

Route::apiResource('thanas', ThanaController::class);
Route::get('thana-list/{district}', [ThanaController::class, 'thanaList']);

Route::apiResource('areas', AreaController::class);
Route::get('area-list/{thana}', [AreaController::class, 'areaList']);
