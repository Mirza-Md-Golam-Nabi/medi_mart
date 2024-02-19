<?php

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

Route::apiResource('thanas', ThanaController::class);
Route::get('thana-list/{district}', [ThanaController::class, 'thanaList']);
