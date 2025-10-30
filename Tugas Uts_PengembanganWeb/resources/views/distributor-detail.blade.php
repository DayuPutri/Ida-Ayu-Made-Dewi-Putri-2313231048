@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary mb-4">Detail Distributor</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $distributor->id }}</p>
            <p><strong>Nama:</strong> {{ $distributor->nama }}</p>
            <p><strong>Alamat:</strong> {{ $distributor->alamat }}</p>
            <a href="/distributor/{{ $distributor->id }}/edit" class="btn btn-warning me-2">Edit</a>
            <a href="/distributor" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection