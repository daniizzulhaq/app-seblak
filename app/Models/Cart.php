<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Fillable harus sesuai kolom di database
    protected $fillable = [
        'user_id',
        'produk_id', // ganti dari alat_musik_id
        'quantity',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk() // ganti dari alatMusik()
    {
        return $this->belongsTo(Produk::class);
    }

    // Helper methods
    public function getSubtotal()
    {
        return $this->quantity * $this->produk->harga; // ganti dari alatMusik
    }
}