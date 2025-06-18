<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Terhubung ke user
            $table->string('order_id')->unique(); // ID unik dari sistem/Midtrans
            $table->decimal('total_amount', 10, 2); // Total nominal order, gunakan decimal untuk uang
            $table->string('status')->default('pending'); // Status pembayaran
            $table->string('payment_method')->nullable(); // Metode pembayaran
            $table->string('transaction_id')->nullable(); // ID transaksi dari Midtrans
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};