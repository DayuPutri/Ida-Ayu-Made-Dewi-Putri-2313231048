@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <h2 class="text-primary mb-4">Data User</h2>
        <div class="mb-3">
            <a href="/user/create" class="btn btn-success me-2">Tambah User</a>
            <a href="/produk" class="btn btn-secondary">Back to Menu</a>
        </div>
        <div class="row mb-3">
            <div class="col-md-5">
                <form method="GET" action="/user">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama atau email..." value="{{ request('search') }}">
                </form>
            </div>
            <div class="col-md-3">
                <form method="GET" action="/user" class="d-inline">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <select name="per_page" onchange="this.form.submit()" class="form-select">
                        <option value="5" {{ request('per_page', 5) == 5 ? 'selected' : '' }}>5 per halaman</option>
                        <option value="10" {{ request('per_page', 5) == 10 ? 'selected' : '' }}>10 per halaman</option>
                        <option value="25" {{ request('per_page', 5) == 25 ? 'selected' : '' }}>25 per halaman</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="/user/{{ $user->id }}" class="btn btn-info btn-sm me-1">Detail</a>
                                <a href="/user/{{ $user->id }}/edit" class="btn btn-warning btn-sm me-1">Edit</a>
                                <form method="POST" action="/user/{{ $user->id }}" style="display: inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Tidak ada data user.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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