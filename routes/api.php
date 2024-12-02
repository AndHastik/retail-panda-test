<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\TariffTypeController;

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

Route::get('/v1/tariffs', [TariffController::class, 'index']);
Route::get('/v1/tariff-types', [TariffTypeController::class, 'index']);
Route::post('/v1/tariffs', [TariffController::class, 'store']);
Route::post('/v1/tariff-types', [TariffTypeController::class, 'store']);
Route::post('/v1/tariffs/comparison', [TariffController::class, 'comparison']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
