@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary mb-4">Edit Distributor</h2>
    <form method="POST" action="/distributor/{{ $distributor->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $distributor->nama }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $distributor->alamat }}">
        </div>
        <button type="submit" class="btn btn-primary me-2">Update</button>
        <a href="/distributor" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection