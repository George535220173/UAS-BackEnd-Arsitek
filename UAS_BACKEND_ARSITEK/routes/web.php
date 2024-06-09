<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProjectController;
use App\Http\Controllers\Auth\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AdminController;

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

Route::get('/service', function () {
    return view('service');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/admin', [ProjectController::class, 'index'])->name('admin.dashboard');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

// Route to display projects and articles
Route::get('/admin', [AdminController::class, 'index'])->name('admin.all');

// Routes for managing projects
Route::get('/admin/projects', [ProjectController::class, 'index'])->name('admin.projects');
Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');

// Routes for managing articles
Route::get('/admin/articles', [ArticleController::class, 'index'])->name('admin.articles');
Route::post('/admin/articles', [ArticleController::class, 'store'])->name('admin.articles.store');


Route::post('/send-email', [ContactController::class, 'sendEmail']);
