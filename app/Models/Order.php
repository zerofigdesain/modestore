<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id', // Ini akan menyimpan order ID dari Midtrans
        'total_amount',
        'status', // Contoh: pending, paid, cancelled, expired, refunded, etc.
        'payment_method', // Opsional: bank transfer, credit card, e-wallet, etc.
        'transaction_id', // Opsional: ID transaksi dari Midtrans
    ];

    /**
     * Relasi dengan model User. Satu order dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan model OrderItem. Satu order memiliki banyak item.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}