
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

// Halaman Product
Route::get('/product', [ProductController::class, 'index']);

// Halaman Tambah Product
Route::get('/product/addProduct', [ProductController::class, 'addProduct']);

// Menyimpan Product
Route::post('/product/store', [ProductController::class, 'store']);

// Halaman Detail Product
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
