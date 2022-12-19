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

Route::get('/adminDashboard',[\App\Http\Controllers\ApiController::class, 'adminDashboard']);

Route::get('/authorDashboard/{user_id}',[\App\Http\Controllers\ApiController::class, 'authorDashboard']);

