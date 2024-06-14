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

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/projects', [AdminController::class, 'store_projects'])->name('admin.projects.store');
Route::post('/admin/articles', [AdminController::class, 'store_articles'])->name('admin.articles.store');

Route::post('/send-email', [ContactController::class, 'sendEmail']);


Route::get('/projects', [AdminController::class, 'showProjects'])->name('projects.index');
Route::get('/projects/{project}', [AdminController::class, 'showProjectDetails'])->name('projects.show');
Route::post('/projects/favorite', [AdminController::class, 'favoriteProject'])->name('projects.favorite');

Route::post('/projects/favorite', [AdminController::class, 'favoriteProject'])->name('projects.favorite');
Route::get('/favorites', [AdminController::class, 'showFavorites'])->name('favorites.index');

Route::delete('/admin/projects/{project}', [AdminController::class, 'destroyProject'])->name('admin.projects.destroy');
Route::delete('/admin/articles/{article}', [AdminController::class, 'destroyArticle'])->name('admin.articles.destroy');

Route::get('/admin/projects/{project}/edit', [AdminController::class, 'editProject'])->name('admin.projects.edit');
Route::put('/admin/projects/{project}', [AdminController::class, 'updateProject'])->name('admin.projects.update');

Route::get('/admin/articles/{article}/edit', [AdminController::class, 'editArticle'])->name('admin.articles.edit');
Route::put('/admin/articles/{article}', [AdminController::class, 'updateArticle'])->name('admin.articles.update');


