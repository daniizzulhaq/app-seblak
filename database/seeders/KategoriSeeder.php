<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        DB::table('kategoris')->insert([
            ['nama_kategori' => 'Makanan', 'deskripsi' => 'Kategori makanan ringan dan berat', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Minuman', 'deskripsi' => 'Kategori minuman segar dan hangat', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Snack', 'deskripsi' => 'Kategori cemilan dan snack', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}