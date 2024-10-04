<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreAlertaController;
use App\Http\Controllers\TrackingHistoryController;
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

Route::get('/', function () {
    return view('welcome');
});

// Resource route for PreAlerta
Route::resource('pre-alertas', PreAlertaController::class);

// Additional routes
Route::get('pre-alertas/{id}/edit-step', [PreAlertaController::class, 'editStep'])->name('prealerta.editStep');
Route::get('rastreo', [TrackingController::class, 'index'])->name('rastreo.index');
Route::get('/pre-alertas/{id}/edit', [PreAlertaController::class, 'edit'])->name('pre-alertas.edit');

// Tracking history
Route::get('/rastrear-envio', [TrackingHistoryController::class, 'index'])->name('tracking-history.index');

