@extends('layouts.app')

@section('content')
<div class="cart-container">

    {{-- Notifikasi sukses jika checkout berhasil --}}
    @if (session('success'))
        <div class="success-notification">
            ✅ {{ session('success') ?? 'Barang siap diluncurkan!' }}
        </div>
    @endif

    <h2 class="cart-title">
        <i class="fas fa-shopping-cart cart-icon"></i> Keranjang Belanja
    </h2>

    @if (session('keranjang') && count(session('keranjang')) > 0)
        @php $total = 0; @endphp
        <ul class="cart-items-list">
            @foreach (session('keranjang') as $item)
                @php $subtotal = $item['harga'] * $item['jumlah']; @endphp
                <li class="cart-item">
                    <div>
                        <p class="item-name">{{ $item['nama'] }}</p>
                        <p class="item-details">{{ $item['jumlah'] }} x Rp{{ number_format($item['harga'], 0, ',', '.') }}</p>
                    </div>
                    <p class="item-subtotal">Rp{{ number_format($subtotal, 0, ',', '.') }}</p>
                </li>
                @php $total += $subtotal; @endphp
            @endforeach
        </ul>

        <hr class="cart-separator">

        <div class="cart-summary">
            <p class="total-label">Total:</p>
            <p class="total-amount">Rp{{ number_format($total, 0, ',', '.') }}</p>
        </div>

        <div class="checkout-button-wrapper">
            <a href="{{ route('checkout') }}" class="checkout-button">
                <i class="fas fa-money-check-alt button-icon"></i> Checkout
            </a>
        </div>
    @else
        <div class="empty-cart">
            <i class="fas fa-box-open empty-cart-icon"></i>
            <p class="empty-cart-message">Keranjang kosong.</p>
            <p class="empty-cart-suggestion">Yuk, tambahkan barang ke keranjang!</p>
            <a href="/" class="shop-now-button">
                Mulai Belanja
            </a>
        </div>
    @endif
</div>

{{-- Pastikan ini dimuat di bagian <head> atau sebelum </body> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    /* Umum */
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5; /* Abu terang */
    }

    .cart-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 30px;
        background-color: #ffffff; /* Putih */
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.8s ease-out;
    }

    /* Notifikasi Sukses */
    .success-notification {
        background-color: #28a745; /* Hijau */
        color: #ffffff;
        padding: 15px;
        text-align: center;
        border-radius: 8px;
        margin-bottom: 25px;
        font-weight: 600;
        animation: slideInFromTop 0.5s ease-out;
    }

    /* Judul Keranjang */
    .cart-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: #1a2a51; /* Biru Dongker Tua */
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 3px solid #1a2a51; /* Biru Dongker Tua */
        text-align: center;
        position: relative;
    }

    .cart-title .cart-icon {
        color: #2a4066; /* Biru Dongker Sedang */
        margin-right: 10px;
        font-size: 2.5rem;
        vertical-align: middle;
    }

    /* Daftar Item Keranjang */
    .cart-items-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #ffffff;
        border: 1px solid #e0e0e0; /* Abu terang */
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .cart-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .item-name {
        font-size: 1.3rem;
        font-weight: 600;
        color: #333333; /* Abu gelap */
        margin-bottom: 5px;
    }

    .item-details {
        font-size: 0.95rem;
        color: #666666; /* Abu sedang */
    }

    .item-subtotal {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2a4066; /* Biru Dongker Sedang */
    }

    /* Separator */
    .cart-separator {
        border: none;
        border-top: 1px dashed #cccccc; /* Abu putus-putus */
        margin: 30px 0;
    }

    /* Ringkasan Total */
    .cart-summary {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #e6f0ff; /* Biru muda */
        padding: 20px;
        border-radius: 10px;
        margin-top: 25px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .total-label {
        font-size: 1.8rem;
        font-weight: 700;
        color: #333333; /* Abu gelap */
    }

    .total-amount {
        font-size: 2.2rem;
        font-weight: 900;
        color: #1a2a51; /* Biru Dongker Tua */
    }

    /* Tombol Checkout */
    .checkout-button-wrapper {
        text-align: center;
        margin-top: 35px;
    }

    .checkout-button {
        display: inline-flex;
        align-items: center;
        padding: 15px 35px;
        background-color: #2a4066; /* Biru Dongker Sedang */
        color: #ffffff;
        font-size: 1.3rem;
        font-weight: 600;
        border: none;
        border-radius: 50px; /* Bentuk kapsul */
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 8px 15px rgba(42, 64, 102, 0.3); /* Bayangan biru dongker */
    }

    .checkout-button:hover {
        background-color: #1a2a51; /* Biru Dongker Lebih Tua */
        transform: translateY(-3px);
        box-shadow: 0 12px 20px rgba(42, 64, 102, 0.4);
    }

    .checkout-button .button-icon {
        margin-right: 12px;
        font-size: 1.5rem;
    }

    /* Keranjang Kosong */
    .empty-cart {
        text-align: center;
        padding: 50px 20px;
        background-color: #fcfcfc; /* Putih keabu-abuan */
        border-radius: 10px;
        border: 1px dashed #d0d0d0; /* Abu putus-putus */
        color: #666666;
        margin-top: 30px;
    }

    .empty-cart-icon {
        font-size: 6rem;
        color: #b0b0b0; /* Abu terang */
        margin-bottom: 25px;
    }

    .empty-cart-message {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .empty-cart-suggestion {
        font-size: 1rem;
        margin-bottom: 30px;
    }

    .shop-now-button {
        display: inline-block;
        padding: 12px 30px;
        background-color: #2a4066; /* Biru Dongker Sedang */
        color: #ffffff;
        font-size: 1.1rem;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 10px rgba(42, 64, 102, 0.2);
    }

    .shop-now-button:hover {
        background-color: #1a2a51; /* Biru Dongker Lebih Tua */
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(42, 64, 102, 0.3);
    }

    /* Animasi */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideInFromTop {
        from { transform: translateY(-50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
</style>
@endsection