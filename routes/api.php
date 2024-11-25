<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\GaleryController;
use App\Http\Controllers\Api\InformationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Test route
Route::get('/test', function() {
    return response()->json(['message' => 'API is working']);
});

// API Routes
Route::prefix('v1')->group(function () {
    // Agenda Routes
    Route::apiResource('agenda', AgendaController::class);
    
    // Gallery Routes
    Route::apiResource('galleries', GaleryController::class);
    
    // Information Routes
    Route::apiResource('information', InformationController::class);
});
 