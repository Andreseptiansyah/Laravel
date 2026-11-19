<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // ambil data kategori, 5 data per halaman
        $data_kategori = CategoryProduct::paginate(5);

        return view('pages.category.show', [
            'kategori' => $data_kategori,
        ]);
    }

    // method create, store, show, edit, update, destroy
    // biarkan seperti bawaan resource controller
}
