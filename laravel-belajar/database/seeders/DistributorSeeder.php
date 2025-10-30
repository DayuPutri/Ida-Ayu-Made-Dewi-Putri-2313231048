<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Distributor;
use Faker\Factory as Faker;

class DistributorSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            Distributor::create([
                'nama' => $faker->company,
                'alamat' => $faker->address,
            ]);
        }
    }
}