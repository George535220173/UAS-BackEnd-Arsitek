<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Admin routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/articles', [AdminController::class, 'store_articles'])->name('admin.articles.store');
Route::post('/admin/projects', [AdminController::class, 'store_projects'])->name('admin.projects.store');
Route::post('/admin/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
Route::delete('/admin/projects/{project}', [AdminController::class, 'destroyProject'])->name('admin.projects.destroy');
Route::delete('/admin/articles/{article}', [AdminController::class, 'destroyArticle'])->name('admin.articles.destroy');
Route::get('/admin/projects/{project}/edit', [AdminController::class, 'editProject'])->name('admin.projects.edit');
Route::put('/admin/projects/{project}', [AdminController::class, 'updateProject'])->name('admin.projects.update');
Route::get('/admin/articles/{article}/edit', [AdminController::class, 'editArticle'])->name('admin.articles.edit');
Route::put('/admin/articles/{article}', [AdminController::class, 'updateArticle'])->name('admin.articles.update');

// Profile routes
Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
Route::post('/profile/change-username', [UserProfileController::class, 'changeUsername'])->name('profile.change-username');
Route::post('/profile/change-email', [UserProfileController::class, 'changeEmail'])->name('profile.change-email');
Route::post('/profile/change-password', [UserProfileController::class, 'changePassword'])->name('profile.change-password');
Route::post('/profile/change-phone', [UserProfileController::class, 'changePhone'])->name('profile.change-phone');
Route::post('/profile/change-address', [UserProfileController::class, 'changeAddress'])->name('profile.change-address');
Route::post('/profile/change-gender', [UserProfileController::class, 'changeGender'])->name('profile.change-gender');
Route::post('/profile/send-auth-code', [UserProfileController::class, 'sendAuthCode'])->name('profile.send-auth-code');
Route::post('/profile/update-optional-fields', [UserProfileController::class, 'updateOptionalFields'])->name('profile.update-optional-fields');
Route::post('/profile/delete-optional-fields', [UserProfileController::class, 'deleteOptionalFields'])->name('profile.delete-optional-fields');

// Contact route
Route::post('/send-email', [ContactController::class, 'sendEmail']);

// Projects route
Route::get('/projects', [AdminController::class, 'showProjects'])->name('projects.index');
// Architecture Projects
Route::get('/projects/architecture', [AdminController::class, 'showArchitectureProjects'])->name('projects.architecture');
Route::get('/projects/architecture/{project}', [AdminController::class, 'showProjectDetails'])->name('projects.architecture.show');

// Interior Design Projects
Route::get('/projects/interiordesign', [AdminController::class, 'showInteriorDesignProjects'])->name('projects.interiordesign');
Route::get('/projects/interiordesign/{project}', [AdminController::class, 'showProjectDetails'])->name('projects.interiordesign.show');

Route::post('/projects/favorite', [AdminController::class, 'favoriteProject'])->name('projects.favorite');
Route::get('/favorites', [AdminController::class, 'showFavorites'])->name('favorites.index');

// Service route
Route::get('/service', function () {
    return view('service');
});