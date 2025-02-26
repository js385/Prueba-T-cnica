<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Rutas de autenticación (generadas por Laravel UI)
Auth::routes();

// Ruta después del registro (en RegisterController)
protected $redirectTo = Route::has('tasks.index') ? 'tasks.index' : '/';

// Rutas protegidas
Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/home', [TaskController::class, 'index'])->name('home');
});