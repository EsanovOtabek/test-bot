<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
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

    Route::resource('subjects', SubjectController::class)->names('subjects')->except(['show','edit', 'create']);

    Route::resource('quizzes', QuizController::class)->names('quizzes')->except('create');

    Route::resource('questions', QuestionController::class)->names('questions')->except(['show','edit', 'create']);

    Route::post('/ckeditor/upload', [App\Http\Controllers\CKEditorController::class, 'upload'])->name('ckeditor.upload');

});
