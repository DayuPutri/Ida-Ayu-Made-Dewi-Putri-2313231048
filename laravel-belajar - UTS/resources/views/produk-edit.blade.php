@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary mb-4">Edit Produk</h2>
    <form method="POST" action="/produk/{{ $product->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $product->nama }}">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $product->harga }}">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="text" class="form-control" id="gambar" name="gambar" value="{{ $product->gambar }}">
        </div>
        <button type="submit" class="btn btn-primary me-2">Update</button>
        <a href="/produk" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection