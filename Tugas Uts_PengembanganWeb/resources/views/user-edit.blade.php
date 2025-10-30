@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary mb-4">Edit User</h2>
    <form method="POST" action="/user/{{ $user->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <button type="submit" class="btn btn-primary me-2">Update</button>
        <a href="/user" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection