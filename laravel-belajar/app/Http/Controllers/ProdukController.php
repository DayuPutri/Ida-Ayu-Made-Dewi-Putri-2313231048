<?php

namespace App\Http\Controllers;  // Namespace ini wajib!

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $products = Produk::all(); // Ambil semua data produk dari model
        return view('produk.index', compact('products')); // Tampilkan view daftar
    }

    // Method lain (create, dll.) tambah nanti
}