@extends('layouts.app')

@section('title', 'Beranda - Sistem Manajemen Data')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row text-center mb-5">
        <div class="col">
            <h1 class="display-4 text-primary mb-3">Selamat Datang di Sistem Manajemen Data</h1>
            <p class="lead text-muted mb-4">Kelola data User, Produk, dan Distributor dengan mudah.</p>

            <!-- Gambar header + tombol -->
            <a href="/user" class="d-block mb-4 mx-auto" style="max-width: 400px;">
                <div class="position-relative text-center">
                    <img src="https://via.placeholder.com/400x250/007bff/ffffff" alt="Header" class="img-fluid rounded shadow" style="height: 250px; object-fit: cover;">
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <a href="/user" class="btn btn-primary btn-lg fw-bold shadow">Lihat Koleksi</a>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Kategori -->
    <div class="row mb-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-primary">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">User</h5>
                    <p class="card-text">Kelola data pengguna dengan CRUD sederhana.</p>
                    <a href="/user" class="btn btn-primary">Lihat Data</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-success">
                <div class="card-body text-center">
                    <i class="fas fa-box fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Produk</h5>
                    <p class="card-text">Tambah dan edit stok produk dengan harga.</p>
                    <a href="/produk" class="btn btn-success">Lihat Data</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-info">
                <div class="card-body text-center">
                    <i class="fas fa-building fa-3x text-info mb-3"></i>
                    <h5 class="card-title">Distributor</h5>
                    <p class="card-text">Catat distributor dengan alamat lengkap.</p>
                    <a href="/distributor" class="btn btn-info">Lihat Data</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Terbaru -->
    <div class="row">
        <div class="col-12">
            <h3 class="text-secondary mb-4">Produk Terbaru</h3>
        </div>

        @forelse ($products as $p)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($p->gambar)
                        <img src="{{ asset('images/' . $p->gambar) }}" 
                             alt="{{ $p->nama }}" 
                             class="card-img-top" 
                             style="height: 200px; width: 100%; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/300x200?text={{ $p->nama }}" 
                             class="card-img-top" 
                             alt="{{ $p->nama }}" 
                             style="height: 200px; width: 100%; object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $p->nama }}</h5>
                        <p class="card-text text-success fw-bold">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                        <a href="/produk" class="btn btn-outline-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted text-center">Belum ada produk. Tambah sekarang!</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
