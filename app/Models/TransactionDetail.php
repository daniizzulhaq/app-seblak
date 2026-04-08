<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'produk_id',    // Sesuai kolom database
        'quantity',
        'price',
        'subtotal',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'price' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    // Relationships
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class); // ganti dari alatMusik
    }

    // Boot method untuk calculate subtotal otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($detail) {
            if (empty($detail->subtotal)) {
                $detail->subtotal = $detail->quantity * $detail->price;
            }
        });

        static::updating(function ($detail) {
            $detail->subtotal = $detail->quantity * $detail->price;
        });
    }
}