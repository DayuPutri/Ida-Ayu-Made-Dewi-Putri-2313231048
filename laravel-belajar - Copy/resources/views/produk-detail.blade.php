@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary mb-4">Detail Produk</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $product->id }}</p>
            <p><strong>Nama:</strong> {{ $product->nama }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
            <p><strong>Gambar:</strong> {{ $product->gambar }}</p>
            <a href="/produk/{{ $product->id }}/edit" class="btn btn-warning me-2">Edit</a>
            <a href="/produk" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection