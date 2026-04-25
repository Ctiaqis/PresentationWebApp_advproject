<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\TutorialDetailController;
use App\Http\Controllers\PresentationController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/presentation/{key}', [PresentationController::class, 'show'])
    ->name('presentation.show');

Route::middleware('external.auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('tutorials.index');
    })->name('dashboard');

    Route::resource('tutorials', TutorialController::class);
    Route::resource('tutorials.details', TutorialDetailController::class)->except(['show']);
});