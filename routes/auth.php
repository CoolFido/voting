<?php

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
