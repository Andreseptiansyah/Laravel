<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Menampilkan daftar produk
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

    // Menampilkan detail produk
    public function show($id)
    {
        $produk = Product::findOrFail($id);

        return view('pages.product.detail', [
            'produk' => $produk
        ]);
    }

    // Menampilkan form tambah produk
    public function addProduct()
    {
        return view('pages.product.addProduct');
    }

    // Menyimpan produk baru
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

        return redirect('/product')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $produk = Product::findOrFail($id);

        return view('pages.product.editProduct', [
            'produk' => $produk
        ]);
    }

    // Memperbarui produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_product' => 'required|min:4|max:20',
            'stock_product' => 'required|integer|min:0',
            'price_product' => 'required|integer|min:0',
            'desc_product' => 'required',
            'id_category' => 'required|integer'
        ]);

        $produk = Product::findOrFail($id);
        $produk->update($request->all());

        return redirect('/product')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $produk = Product::findOrFail($id);
        $produk->delete();

        return redirect('/product')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
