<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\TravelerController;
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

Route::group([
    'prefix' => 'traveler',
], function () {
    Route::post('/')->uses([TravelerController::class, 'store']);

    Route::group([
        'middleware' => ['is.traveler'],
    ], function() {
        Route::patch('/{uuid}')->uses([TravelerController::class, 'update']);
    });
});

Route::group([
    'prefix' => 'location',
    'middleware' => ['is.traveler'],
], function () {
    Route::post('/')->uses([LocationController::class, 'store']);
});
