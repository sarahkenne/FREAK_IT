<?php
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\GestAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerUser;
use App\Http\Controllers\SujetController;
use App\Http\Controllers\MessageController;
use App\Models\Categorie;

// Dashboard route utilisant le contrôleur SujetController
Route::get('/dashboard', [SujetController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/confirm/{id}/{token}', 'Auth\RegisterUserController@confirm');

// Routes pour les sujets
Route::get('/sujets', [SujetController::class, 'index'])->name('sujets.index');
Route::get('/creatSujets', [SujetController::class, 'create'])->name('creatSujets');
Route::post('/sujets', [SujetController::class, 'store'])->name('sujets.store');
Route::get('/sujets/{sujet}', [SujetController::class, 'show'])->name('sujetsShow');

Route::get('/messages', [MessageController::class, 'index'])->name('messages');
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
Route::post('/messages/{id}', [MessageController::class, 'store'])->name('messagesStore');
Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
Route::get('/messages/{message}/edit', [MessageController::class, 'edit'])->name('messages.edit');
Route::put('/messages/{message}', [MessageController::class, 'update'])->name('messages.update');
Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

// Routes pour les catégories
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');
Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');

// Autres routes existantes...

// Manager route
Route::get('Manager', [ManagerUser::class, 'index']);

// Routes d'authentification
require __DIR__.'/auth.php';
