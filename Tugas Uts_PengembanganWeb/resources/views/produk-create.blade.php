@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="text-primary mb-4">Tambah Produk</h2>
        <form method="POST" action="/produk">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="text" class="form-control" id="gambar" name="gambar" placeholder="laptop.jpg">
            </div>
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="/produk" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection