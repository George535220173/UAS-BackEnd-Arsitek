<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('index');
});

Route::get('/portofolio', function () {
    return view('portofolio');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/profile', [UserProfileController::class, 'show'])->name('profile')->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/projects', [AdminController::class, 'store_projects'])->name('admin.projects.store');
Route::post('/admin/articles', [AdminController::class, 'store_articles'])->name('admin.articles.store');

Route::post('/send-email', [ContactController::class, 'sendEmail']);

Route::get('/projects', [AdminController::class, 'showProjects'])->name('projects.index');
Route::get('/projects/{project}', [AdminController::class, 'showProjectDetails'])->name('projects.show');

