<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProjectController;
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
Route::post('/profile/send-auth-code', [UserProfileController::class, 'sendAuthCode'])->name('profile.send-auth-code');
Route::post('/profile/update-optional-fields', [UserProfileController::class, 'updateOptionalFields'])->name('profile.update-optional-fields');
Route::post('/profile/delete-optional-fields', [UserProfileController::class, 'deleteOptionalFields'])->name('profile.delete-optional-fields');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/service', function () {
    return view('service');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/admin', [ProjectController::class, 'index'])->name('admin.dashboard');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');


Route::post('/send-email', [ContactController::class, 'sendEmail']);


