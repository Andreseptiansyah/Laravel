
@extends('layouts.master')

@section('content')
<h1>Daftar produk kami</h1>
<hr>

<a href="/product/addProduct" class="btn btn-primary mb-3">
    Tambah Data
</a>

<div class="card">
    <div class="card-header">
        Produk Kami
    </div>

    <div class="alert alert-primary">
        <b>Nama Toko : </b> {{ $data_toko['nama_toko'] }}
        <br>
        <b>Alamat Toko : </b> {{ $data_toko['alamat_toko'] }}
        <br>
        <b>Status Toko : </b> {{ $data_toko['status_toko'] }}
    </div>

    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($data_produk as $item)
                <tr>
                    <th scope="row">
                        {{ $data_produk->firstItem() + $loop->index }}
                    </th>

                    <td>{{ $item->name_product }}</td>
                    <td>{{ $item->stock_product }}</td>

                    <td>
                        Rp. {{ number_format($item->price_product, 0, ',', '.') }}
                    </td>

                    <td>{{ $item->desc_product }}</td>

                    <td>
                        <form action="/product/{{ $item->id_product }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Apakah anda yakin akan menghapus data {{ $item->name_product }} ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>

                        <a href="/product/{{ $item->id_product }}/edit"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="/product/{{ $item->id_product }}"
                           class="btn btn-info btn-sm">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Data produk tidak ditemukan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div>
            {{ $data_produk->links('pagination::bootstrap-5') }}

            <p class="mb-0">
                Halaman : {{ $data_produk->currentPage() }}
            </p>

            <p class="mb-0">
                Jumlah Data : {{ $data_produk->total() }}
            </p>

            <p class="mb-0">
                Data Per Halaman : {{ $data_produk->perPage() }}
            </p>
        </div>
    </div>
</div>
@endsection
