<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Главная страница — редирект на /blog (публичная лента)
Route::get('/', function () {
    return redirect()->route('posts.public');
});

// Публичная страница: все посты всех пользователей
Route::get('/blog', [PostController::class, 'publicIndex'])->name('posts.public');

// Страница dashboard Breeze (опционально)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Профиль пользователя и CRUD-посты — только для авторизованных
Route::middleware('auth')->group(function () {
    // Профиль
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD постов
    Route::resource('posts', PostController::class)->except(['show']);
});

// Breeze auth routes
require __DIR__.'/auth.php';
