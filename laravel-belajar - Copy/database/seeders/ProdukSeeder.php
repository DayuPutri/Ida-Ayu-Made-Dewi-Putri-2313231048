<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Distributor;
use Faker\Factory as Faker;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $distributors = Distributor::all();

        for ($i = 1; $i <= 10; $i++) {
            Produk::create([
                'nama' => $faker->words(2, true),
                'harga' => $faker->numberBetween(50000, 10000000),
                'gambar' => $faker->word . '.jpg',
                'distributor_id' => $distributors->random()->id, // Relasi: pilih distributor random
            ]);
        }
    }
}