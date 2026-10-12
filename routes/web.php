<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;

// Halaman Depan (Bisa diakses siapa saja)
Route::get('/', [ProjectController::class, 'index'])->name('portfolio');

// Halaman Admin Dashboard (DIKUNCI / Hanya bisa diakses setelah Login)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::post('/admin/project', [AdminController::class, 'storeProject'])->name('admin.project.store');
    Route::put('/admin/project/{id}', [AdminController::class, 'updateProject'])->name('admin.project.update');
    Route::delete('/admin/project/{id}', [AdminController::class, 'destroyProject'])->name('admin.project.destroy');
});

// Mengaktifkan rute autentikasi bawaan Laravel
require __DIR__.'/auth.php';
