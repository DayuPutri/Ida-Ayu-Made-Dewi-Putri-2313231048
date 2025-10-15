<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produk;  // Import model

Route::get('/', function () {
    $products = Produk::whereIn('nama', ['Laptop', 'Mouse', 'Keyboard'])->get(); // Filter hanya 3 ini
    return view('home', compact('products'));
});

// Route lain tetap
Route::get('/user', function () {
    $users = [
        ['nama' => 'John Doe', 'email' => 'john@example.com'],
        ['nama' => 'Jane Smith', 'email' => 'jane@example.com'],
        ['nama' => 'Bob Johnson', 'email' => 'bob@example.com']
    ];
    return view('user', compact('users'));
});

Route::get('/produk', function () {
    $products = [
        ['nama' => 'Laptop', 'harga' => 7500000],
        ['nama' => 'Mouse', 'harga' => 100000],
        ['nama' => 'Keyboard', 'harga' => 250000]
    ];
    return view('produk', compact('products'));
});

Route::get('/distributor', function () {
    $distributors = [
        ['nama' => 'PT Elektronik Jaya', 'alamat' => 'Jl. Merdeka No. 10'],
        ['nama' => 'CV Sumber Makmur', 'alamat' => 'Jl. Raya Barat No. 25'],
        ['nama' => 'Toko Abadi', 'alamat' => 'Jl. Sudirman No. 50']
    ];
    return view('distributor', compact('distributors'));
});