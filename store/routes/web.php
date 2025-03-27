<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GamesController::class, 'welcome'])->name('welcome');
Route::view('/about', 'about')->name('about');
Route::view('/suport', 'suport')->name('suport');

Route::get('/games', [GamesController::class, 'index'])->name('games.index');
Route::get('/games/{game}', [GamesController::class, 'show'])->name('games.show');

Route::fallback(function () {
    return redirect()->route('welcome');
});

Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('/game-register', 'games.create')->name('games.create');
    Route::post('/games', [GamesController::class, 'store'])->name('games.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
