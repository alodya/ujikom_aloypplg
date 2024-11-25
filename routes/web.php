<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Welcome route with data
Route::get('/', [WelcomeController::class, 'index']);

// Auth routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('gallery', GalleryController::class);
    Route::resource('agenda', AgendaController::class);
    Route::resource('information', InformationController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Public routes
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/information', [InformationController::class, 'index'])->name('information');

require __DIR__.'/auth.php';
