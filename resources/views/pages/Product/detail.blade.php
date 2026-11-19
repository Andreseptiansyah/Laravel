
@extends('layouts.master')

@section('content')

<h1>Detail Produk</h1>
<hr>

<div class="card">
    <div class="card-header">
        Detail Produk
    </div>

    <div class="card-body">
        <div class="card" style="width: 350px;">
            <div class="card-body">

                <h5 class="card-title">
                    {{ $produk->name_product }}
                </h5>

                <p>
                    Harga: Rp. {{ number_format($produk->price_product, 0, ',', '.') }}
                </p>

                <hr>

                <p>
                    Stok: {{ $produk->stock_product }} pcs
                </p>

                <hr>

                <p>
                    Tipe: {{ $produk->desc_product }}
                </p>

                <a href="/product" class="btn btn-primary">
                    Kembali ke product
                </a>

            </div>
        </div>
    </div>
</div>

@endsection
