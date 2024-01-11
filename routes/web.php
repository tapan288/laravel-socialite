<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Socialite\AuthIndexController;
use App\Http\Controllers\Socialite\AuthCallbackController;
use App\Http\Controllers\Socialite\AuthRedirectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/auth', AuthIndexController::class)->name('auth.index');
    Route::get('/auth/redirect', AuthRedirectController::class)->name('auth.redirect');
    Route::get('/auth/callback', AuthCallbackController::class)->name('auth.callback');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
