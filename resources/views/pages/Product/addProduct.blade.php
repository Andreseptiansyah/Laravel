
@extends('layouts.master')

@section('content')
    <h4>Tambah Produk</h4>
    <hr>

    <div class="card">
        <div class="card-body">
            <form action="/product/store" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="name_product"
                        class="form-control"
                        value="{{ old('name_product') }}">

                    @error('name_product')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stock_product"
                        class="form-control"
                        value="{{ old('stock_product') }}">

                    @error('stock_product')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="price_product"
                        class="form-control"
                        value="{{ old('price_product') }}">

                    @error('price_product')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="desc_product"
                        class="form-control">{{ old('desc_product') }}</textarea>

                    @error('desc_product')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>ID Kategori</label>
                    <input type="number" name="id_category"
                        class="form-control"
                        value="{{ old('id_category') }}">

                    @error('id_category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="/product" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
@endsection
