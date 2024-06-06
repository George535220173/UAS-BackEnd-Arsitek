<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('index');
});

Route::get('/portofolio', function () {
    return view('portofolio');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [RegisterController::class, 'register']);
