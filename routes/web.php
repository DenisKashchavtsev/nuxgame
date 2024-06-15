<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RegistrationController::class, 'create'])->name('home');
Route::post('/', [RegistrationController::class, 'store'])->name('registration');

Route::get('/dashboard/{user}', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/dashboard/generate-link/{user}', [DashboardController::class, 'generateLink'])->name('dashboard.generateLink');
Route::post('/dashboard/deactivate-link/{user}', [DashboardController::class, 'deactivateLink'])->name('dashboard.deactivateLink');
Route::get('/dashboard/history/{user}', [DashboardController::class, 'history'])->name('dashboard.history');
Route::post('/dashboard/imfeelinglucky/{user}', [DashboardController::class, 'imFeelingLucky'])->name('dashboard.imFeelingLucky');
