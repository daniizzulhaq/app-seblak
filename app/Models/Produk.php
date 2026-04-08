<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'kategori_id',
        'level_pedas_id',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'stok'  => 'integer',
    ];

    // Relationships
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function levelPedas()
    {
        return $this->belongsTo(LevelPedas::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    // Helper methods
    public function isAvailable(): bool
    {
        return $this->stok > 0;
    }

    public function decreaseStock(int $quantity): void
    {
        $this->decrement('stok', $quantity);
    }

    public function increaseStock(int $quantity): void
    {
        $this->increment('stok', $quantity);
    }
}