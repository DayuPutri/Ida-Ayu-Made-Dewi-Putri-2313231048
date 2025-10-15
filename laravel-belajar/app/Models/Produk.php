<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk'; // Override nama tabel default 'produks' jadi 'produk'

    protected $fillable = ['nama', 'harga']; // Kolom yang bisa diisi otomatis dari form
}