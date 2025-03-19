<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\AdminController;

// Route principale - page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes pour les réclamations
Route::get('/reclamation', [ReclamationController::class, 'create'])->name('reclamation.create');
Route::post('/reclamations', [ReclamationController::class, 'store'])->name('reclamations.store');
Route::get('/admin/reclamations', [ReclamationController::class, 'index'])->name('admin.reclamations');
Route::put('/reclamations/{id}', [ReclamationController::class, 'update'])->name('reclamations.update');
Route::delete('/reclamations/{id}', [ReclamationController::class, 'destroy'])->name('reclamations.destroy');

// Route pour le chatbot
Route::post('/chatbot/message', [ChatbotController::class, 'message'])->name('chatbot.message');

// Routes d'administration
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/password', [AdminController::class, 'showChangePasswordForm'])->name('admin.password');
    Route::put('/password', [AdminController::class, 'updatePassword'])->name('admin.password.update');
    Route::get('/forms', [AdminController::class, 'forms'])->name('admin.forms');
});

// Routes d'authentification (si vous n'utilisez pas Auth::routes())
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

