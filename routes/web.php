<?php

use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('exports', 'exports')
    ->middleware(['auth', 'verified'])
    ->name('exports');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/exports/{export}/download', [ExportController::class, 'download'])
    ->middleware(['auth', 'verified'])
    ->name('exports.download');

require __DIR__.'/auth.php';
