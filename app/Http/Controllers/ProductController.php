<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $data_toko = [
            'nama_toko' => 'Andre Septiansyah',
            'alamat_toko' => 'Subang',
            'status_toko' => 'Aktif'
        ];

        $data_produk = Product::paginate(10);

        return view('pages.product.show', [
            'data_toko' => $data_toko,
            'data_produk' => $data_produk
        ]);
    }

    public function show($id)
    {
        $produk = Product::findOrFail($id);

        return view('pages.product.detail', [
            'produk' => $produk
        ]);
    }

    public function addProduct()
    {
        return view('pages.product.addProduct');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_product' => 'required|min:4|max:20',
            'stock_product' => 'required|integer|min:0',
            'price_product' => 'required|integer|min:0',
            'desc_product' => 'required',
            'id_category' => 'required|integer'
        ]);

        Product::create($request->all());

        return redirect('/product');
    }
}
