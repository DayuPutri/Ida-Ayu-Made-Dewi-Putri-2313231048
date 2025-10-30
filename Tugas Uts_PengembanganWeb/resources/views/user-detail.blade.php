@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary mb-4">Detail User</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Nama:</strong> {{ $user->nama }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <a href="/user/{{ $user->id }}/edit" class="btn btn-warning me-2">Edit</a>
            <a href="/user" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection