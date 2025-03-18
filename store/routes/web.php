<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GamesController::class, 'welcome'])->name('welcome');

Route::get('/games', [GamesController::class, 'index'])->name('games.index');

Route::fallback(function () {
    return redirect()->route('welcome');
});

Route::middleware('auth')->group(function () {
    Route::view('/game-register', 'games.create')->name('game.register');
    Route::post('/game-register', [GamesController::class, 'store'])->name('games.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
