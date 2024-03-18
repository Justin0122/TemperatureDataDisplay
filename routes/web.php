<?php

use App\Livewire\DynamicTempTables;
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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/sensors', DynamicTempTables::class)->middleware(['auth'])->name('sensors');

Route::get('/graph', \App\Livewire\Temperature::class)->middleware(['auth'])->name('graph');


require __DIR__.'/auth.php';
