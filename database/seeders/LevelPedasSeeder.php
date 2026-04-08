<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelPedasSeeder extends Seeder
{
    public function run()
    {
        DB::table('level_pedas')->insert([
            ['nama_level' => 'Original', 'created_at' => now(), 'updated_at' => now()],
            ['nama_level' => 'Pedas', 'created_at' => now(), 'updated_at' => now()],
            ['nama_level' => 'Extra Pedas', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}