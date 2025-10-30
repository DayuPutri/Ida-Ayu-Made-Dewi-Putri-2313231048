<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Produk;
use App\Models\Distributor;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // 10 Dummy User (email unique random)
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'nama' => $faker->name,
                'email' => $faker->unique()->safeEmail,
            ]);
        }

        // 10 Dummy Produk (nama/harga random)
        for ($i = 1; $i <= 10; $i++) {
            Produk::create([
                'nama' => $faker->words(2, true),
                'harga' => $faker->numberBetween(50000, 10000000),
                'gambar' => $faker->imageUrl(300, 200, 'tech'),
            ]);
        }

        // 10 Dummy Distributor (nama/alamat/telepon random)
        for ($i = 1; $i <= 10; $i++) {
            Distributor::create([
                'nama' => $faker->company,
                'alamat' => $faker->address,
                'telepon' => $faker->phoneNumber, // Fix: Isi 'telepon' random
            ]);
        }
    }
}