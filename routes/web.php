<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routing /home dengan NIM Anda
Route::get('/home', function () {
    return 'Selamat Pagi Dunia, 707082400032';
});