<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'harga', 'gambar', 'distributor_id'];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }
}