@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <h2 class="text-primary mb-4">Data Distributor</h2>
        <!-- Tombol Tambah & Back to Menu -->
        <div class="mb-3">
            <a href="/distributor/create" class="btn btn-success me-2">Tambah Distributor</a>
            <a href="/" class="btn btn-secondary">Back to Menu</a>
        </div>

        <!-- Form Search & Dropdown Per Halaman -->
        <div class="row mb-3">
            <div class="col-md-5">
                <form method="GET" action="/distributor">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama atau alamat..." value="{{ request('search') }}">
                </form>
            </div>
            <div class="col-md-3">
                <form method="GET" action="/distributor" class="d-inline">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <select name="per_page" onchange="this.form.submit()" class="form-select">
                        <option value="5" {{ request('per_page', 5) == 5 ? 'selected' : '' }}>5 per halaman</option>
                        <option value="10" {{ request('per_page', 5) == 10 ? 'selected' : '' }}>10 per halaman</option>
                        <option value="25" {{ request('per_page', 5) == 25 ? 'selected' : '' }}>25 per halaman</option>
                    </select>
                </form>
            </div>
        </div>

        <!-- Tabel Data dengan Aksi -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($distributors as $distributor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $distributor->nama }}</td>
                            <td>{{ $distributor->alamat }}</td>
                            <td>
                                <a href="/distributor/{{ $distributor->id }}" class="btn btn-info btn-sm me-1">Detail</a>
                                <a href="/distributor/{{ $distributor->id }}/edit" class="btn btn-warning btn-sm me-1">Edit</a>
                                <form method="POST" action="/distributor/{{ $distributor->id }}" style="display: inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Tidak ada data distributor.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Sederhana -->
        <div class="d-flex justify-content-center mt-3">
            <nav aria-label="Pagination">
                <ul class="pagination">
                    <li class="page-item {{ $currentPage <= 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $currentPage > 1 ? '?page=' . ($currentPage - 1) : '#' }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $totalPages; $i++)
                        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                            <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $currentPage >= $totalPages ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $currentPage < $totalPages ? '?page=' . ($currentPage + 1) : '#' }}">Next</a>
                    </li>
                </ul>
            </nav>
            <p class="text-muted ms-3 align-self-center">Showing {{ $startItem }} to {{ $endItem }} of {{ $totalItems }} results</p>
        </div>
    </div>
</div>
@endsection