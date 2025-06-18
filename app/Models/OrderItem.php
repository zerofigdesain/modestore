<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price', // Harga produk saat dipesan (penting untuk histori)
    ];

    /**
     * Relasi dengan model Order. Satu order item dimiliki oleh satu order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relasi dengan model Product. Satu order item terhubung ke satu produk.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}