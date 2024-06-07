<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('index');
});

Route::get('/portofolio', function () {
    return view('portofolio');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/profile', [UserProfileController::class, 'show'])->name('profile')->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
=======
Route::get('/service', function () {
    return view('service');
});
