<?php

use App\Http\Controllers\Admin\CompetitionsController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/**
 * Auth Routes
 * ----------------------------------------
 * These routes are accessible only by logged-in users.
 */

/**
 * User homepage
 */
Route::get('/home', [HomeController::class, 'index'])->name('home');

/**
 * Admin
 */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::redirect('', 'admin/competitions');

    /**
     * Competitions
     */
    Route::resource('competitions', CompetitionsController::class, ['except' => ['destroy']]);
    Route::get('competitions/{competition}/destroy', [CompetitionsController::class, 'destroy'])->name('competitions.destroy');

    /**
     * Projects
     */
    Route::get('projects/{project}/destroy', [ProjectsController::class, 'destroy'])->name('projects.destroy');
});
