<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
    UserSeeder::class,
    // DaerahSeeder::class, // sudah dihapus
    KategoriSeeder::class,
    LevelPedasSeeder::class,
    ProdukSeeder::class,
]);
    }
}