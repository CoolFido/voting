<?php

use App\Http\Controllers\API\CompetitionsController;
use App\Http\Controllers\Api\EvalutaionsController;
use App\Http\Controllers\API\ProjectsController;
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
    
    /**
     * Projects
     */
    Route::post('projects/{project}', [ProjectsController::class, 'evaluate']);
    Route::post('projects/{project}/unevaluate', [ProjectsController::class, 'unevaluate']);
    Route::post('projects', [ProjectsController::class, 'store']);

    /**
     * Evaluations
     */
    Route::get('evaluations/{project}', [EvalutaionsController::class, 'show']);

});
