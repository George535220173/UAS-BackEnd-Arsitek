<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\PortfolioController;
use App\Http\Controllers\HomeController;

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [ProjectController::class, 'index'])->name('admin.dashboard');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

Route::post('/send-email', [ContactController::class, 'sendEmail']);

Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');

