<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelPedas extends Model
{
    use HasFactory;

    protected $table = 'level_pedas';

    protected $fillable = [
        'nama_level',
    ];

    // Relasi ke produk
    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}