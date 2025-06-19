<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Главная страница — редирект на /posts (после логина)
Route::get('/', function () {
    return redirect()->route('posts.index');
});

// Страница dashboard по умолчанию Breeze (можно оставить или убрать)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Профиль пользователя
Route::middleware('auth')->group(function () {
    // Профиль
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Посты
    Route::resource('posts', PostController::class)->except(['show']);
});

// Аутентификация Breeze
require __DIR__.'/auth.php';
