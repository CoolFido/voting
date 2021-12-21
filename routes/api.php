<?php

use App\Http\Controllers\API\CompetitionsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/**
 * API Routes
 * ----------------------------------------
 * These routes are prefixed as API.
 */

Route::middleware('auth')->group(function () {
    /**
     * Competitions
     */
    Route::get('competitions', [CompetitionsController::class, 'index']);
    Route::get('competitions/{competition}', [CompetitionsController::class, 'show']);
});
