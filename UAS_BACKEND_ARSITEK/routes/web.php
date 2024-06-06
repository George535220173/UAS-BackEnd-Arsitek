<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/portofolio', function () {
    return view('portofolio');
});
    