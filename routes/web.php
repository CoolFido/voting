<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Integrations\DiscordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('welcome');

/**
 * Auth links
 */
Route::name('auth.')->prefix('auth')->group(function () {
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

/**
 * Discord OAuth2
 */
Route::name('discord.')->prefix('discord')->group(function () {
    Route::get('authorize', [DiscordController::class, 'create'])->name('authorize');
    Route::get('unauthorize', [DiscordController::class, 'destroy'])->name('unauthorize');
});

Route::get('logout', fn() => null)->name('logout');
