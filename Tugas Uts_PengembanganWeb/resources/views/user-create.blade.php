@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="text-primary mb-4">Tambah User</h2>
        <form method="POST" action="/user">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="/user" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection