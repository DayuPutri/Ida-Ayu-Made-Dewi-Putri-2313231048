@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="text-primary mb-4">Tambah Distributor</h2>
        <form method="POST" action="/distributor">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="/distributor" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection