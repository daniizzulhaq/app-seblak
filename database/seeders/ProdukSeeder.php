<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        DB::table('produk')->insert([
            [
                'nama_produk' => 'Seblak Original',
                'kategori_id' => 1,         // asumsi 'Makanan'
                'level_pedas_id' => 1,      // 'Original'
                'deskripsi' => 'Seblak dengan rasa original tanpa tambahan pedas',
                'harga' => 15000,
                'stok' => 50,
                'gambar' => 'seblak_original.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Seblak Pedas',
                'kategori_id' => 1,
                'level_pedas_id' => 2,      // 'Pedas'
                'deskripsi' => 'Seblak dengan tingkat kepedasan sedang',
                'harga' => 17000,
                'stok' => 40,
                'gambar' => 'seblak_pedas.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Seblak Extra Pedas',
                'kategori_id' => 1,
                'level_pedas_id' => 3,      // 'Extra Pedas'
                'deskripsi' => 'Seblak dengan tingkat kepedasan ekstra',
                'harga' => 19000,
                'stok' => 30,
                'gambar' => 'seblak_extra_pedas.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}