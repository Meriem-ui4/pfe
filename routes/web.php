<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatbotController;

// Route principale - page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes pour les réclamations
Route::get('/reclamation', [ReclamationController::class, 'create'])->name('reclamation.create');
Route::post('/reclamations', [ReclamationController::class, 'store'])->name('reclamations.store');
Route::get('/admin/reclamations', [ReclamationController::class, 'index'])->name('admin.reclamations');
Route::put('/reclamations/{id}', [ReclamationController::class, 'update'])->name('reclamations.update');

// Route pour le chatbot
Route::post('/chatbot/message', [ChatbotController::class, 'message'])->name('chatbot.message');
Route::delete('/reclamations/{id}', [ReclamationController::class, 'destroy'])->name('reclamations.destroy');