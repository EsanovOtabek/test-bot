<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

// auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginAdmin'])->name('login.check');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// web routes
Route::get("/", [SiteController::class, 'index'])->name("index");


// Admin panel faqat login qilgan adminlar uchun
Route::middleware(['auth', 'admin'])->prefix('admin/')->name("admin.")->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects');

});
