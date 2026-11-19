
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

// Halaman Beranda
Route::get('/', function () {
    return view('pages.beranda');
});

// Halaman About
Route::get('/about', function () {
    return view('pages.about', [
        'nama' => 'Andre Septiansyah',
        'kelas' => '48-01',
        'nim' => '707082400032',
    ]);
});

// Halaman Contact
Route::view('/contact', 'pages.contact');

// CRUD Product
Route::get('/product', [ProductController::class, 'index']);

Route::get('/product/addProduct', [ProductController::class, 'addProduct']);

Route::post('/product/store', [ProductController::class, 'store']);

Route::get('/product/{id}/edit', [ProductController::class, 'edit']);

Route::put('/product/{id}', [ProductController::class, 'update']);

Route::delete('/product/{id}', [ProductController::class, 'destroy']);

Route::get('/product/{id}', [ProductController::class, 'show']);

// Halaman Category
Route::get('/category', [CategoryController::class, 'index']);

// Halaman Latihan
Route::get('/latihan', function () {
    $matakuliah = [
        'Pemrograman Web',
        'Basis Data',
        'UI/UX'
    ];

    return view('pages.latihan', [
        'matakuliah' => $matakuliah
    ]);
});

// Halaman Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
