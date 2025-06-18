@extends('layouts.app')

@section('content')
<style>
    /* Reset dan Base Styles */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    
    body {
        font-family: 'Inter', sans-serif; /* Menggunakan font Inter atau sans-serif default */
        background-color: #f9fafb; /* Latar belakang halaman putih lembut */
    }

    /* Container Utama */
    .product-page {
        background-color: #f9fafb; /* Latar belakang halaman putih lembut */
        min-height: 100vh;
        padding: 4rem 1.5rem; /* Padding lebih besar */
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden; /* Mengatasi potensi scroll horizontal dari efek */
    }
    
    /* Card Produk */
    .product-card {
        background: #fff; /* Card putih */
        border: 1px solid #e5e7eb; /* Border abu-abu lembut */
        border-radius: 28px; /* Lebih bulat */
        box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.1), /* Bayangan lebih lembut */
                    0 5px 10px -5px rgba(0, 0, 0, 0.05);
        max-width: 1280px; /* Lebih lebar */
        margin: 0 auto;
        overflow: hidden;
        transition: transform 0.4s ease-out, box-shadow 0.4s ease-out; /* Transisi lebih halus */
        position: relative;
        z-index: 1; /* Pastikan di atas elemen latar belakang */
    }
    
    .product-card:hover {
        transform: translateY(-5px); /* Sedikit naik */
        box-shadow: 0 15px 30px -8px rgba(0, 0, 0, 0.2); /* Bayangan lebih dalam */
    }
    
    /* Grid Layout */
    .product-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0;
    }
    
    @media (min-width: 1024px) {
        .product-grid {
            grid-template-columns: 1.2fr 1fr; /* Gambar sedikit lebih besar */
        }
    }
    
    /* Image Section */
    .image-section {
        background: #f3f4f6; /* Latar belakang gambar abu-abu terang */
        padding: 3rem 2.5rem; /* Padding lebih besar */
        display: flex;
        align-items: center;
        justify-content: center;
        border-right: 1px solid #d1d5db; /* Border abu-abu lembut */
        position: relative;
        overflow: hidden;
    }
    
    /* Latar belakang abstrak di bagian gambar */
    .image-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle at 50% 50%, rgba(59, 130, 246, 0.05) 0%, transparent 70%);
        transform: rotate(45deg);
        animation: rotateBg 15s linear infinite; /* Animasi berputar */
    }

    @keyframes rotateBg {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @media (max-width: 1023px) {
        .image-section {
            border-right: none;
            border-bottom: 1px solid #d1d5db; /* Border abu-abu lembut */
            padding: 2.5rem 1.5rem;
        }
        .image-section::before {
            display: none; /* Matikan animasi di mobile */
        }
    }
    
    .image-container {
        width: 100%;
        max-width: 550px; /* Maks lebar gambar */
        position: relative;
        z-index: 2; /* Pastikan gambar di atas efek latar belakang */
    }
    
    .product-image {
        width: 100%;
        height: auto;
        max-height: 550px; /* Maks tinggi gambar */
        object-fit: contain;
        border-radius: 20px; /* Sedikit lebih bulat */
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 2px 5px rgba(0, 0, 0, 0.05); /* Shadow lebih lembut */
        transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.4s ease; /* Transisi yang lebih mulus */
        border: 1px solid #d1d5db; /* Border gambar yang lebih jelas */
    }
    
    .product-image:hover {
        transform: scale(1.03) rotate(-1deg); /* Sedikit zoom dan putar */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 3px rgba(59, 130, 246, 0.1); /* Efek glow biru */
    }
    
    /* Content Section */
    .content-section {
        padding: 3rem 2.5rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #374151; /* Warna teks lebih gelap */
    }
    
    /* Typography */
    .product-title {
        font-size: 3.5rem; /* Lebih besar */
        font-weight: 900; /* Lebih tebal */
        line-height: 1.05; /* Lebih rapat */
        margin-bottom: 1.5rem;
        color: #1e3a8a; /* Biru dongker */
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Text shadow halus */
    }
    
    @media (min-width: 1024px) {
        .product-title {
            font-size: 4.5rem; /* Sangat besar di desktop */
        }
    }
    
    .product-description {
        font-size: 1.25rem; /* Lebih besar */
        line-height: 1.8; /* Lebih nyaman dibaca */
        color: #4b5563; /* Warna abu-abu gelap */
        margin-bottom: 2.5rem; /* Jarak lebih banyak */
        font-weight: 300;
        border-left: 5px solid #3b82f6; /* Garis biru yang lebih kuat */
        padding-left: 1.5rem;
        font-style: italic;
    }
    
    @media (min-width: 768px) {
        .product-description {
            font-size: 1.35rem;
        }
    }
    
    /* Price Section */
    .price-section {
        background: rgba(255, 255, 255, 0.7); /* Latar belakang putih transparan */
        border: 1px solid #d1d5db; /* Border abu-abu lembut */
        border-radius: 20px; /* Lebih bulat */
        padding: 2.5rem; /* Padding lebih besar */
        margin-bottom: 3rem; /* Jarak lebih banyak */
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(10px); /* Efek blur kaca */
        -webkit-backdrop-filter: blur(10px);
        animation: slideInFromLeft 0.8s ease-out; /* Animasi masuk */
    }
    
    .price-section::before {
        content: '';
        position: absolute;
        top: -10%;
        right: -10%;
        width: 120%;
        height: 120%;
        background: radial-gradient(circle at 80% 20%, rgba(59, 130, 246, 0.05) 0%, transparent 70%);
        opacity: 0.7;
        pointer-events: none;
        animation: pulseGradient 3s infinite alternate; /* Animasi denyut halus */
    }

    @keyframes pulseGradient {
        from { opacity: 0.7; transform: scale(1); }
        to { opacity: 0.9; transform: scale(1.05); }
    }
    
    .price-display {
        display: flex;
        align-items: baseline;
        gap: 0.75rem; /* Jarak lebih besar */
        position: relative;
        z-index: 1;
    }
    
    .price-currency {
        font-size: 1.8rem; /* Lebih besar */
        color: #6b7280; /* Abu-abu gelap */
        font-weight: 600; /* Lebih tebal */
    }
    
    .price-amount {
        font-size: 4rem; /* Lebih besar */
        font-weight: 800; /* Lebih tebal */
        color: #06b6d4; /* Teal */
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Text shadow halus */
    }
    
    @media (min-width: 768px) {
        .price-amount {
            font-size: 5rem; /* Sangat besar di desktop */
        }
    }
    
    /* Form Styles */
    .purchase-form {
        display: flex;
        flex-direction: column;
        gap: 2rem; /* Jarak antar elemen form */
    }
    
    .quantity-group {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .quantity-label {
        font-size: 1.1rem; /* Lebih besar */
        font-weight: 600; /* Lebih tebal */
        color: #374151; /* Warna teks lebih gelap */
    }
    
    .quantity-input {
        width: 140px; /* Lebih lebar */
        padding: 0.85rem 1.25rem; /* Padding lebih besar */
        background: #fff; /* Input putih */
        border: 1px solid #d1d5db; /* Border abu-abu lembut */
        border-radius: 14px; /* Lebih bulat */
        color: #374151; /* Warna teks lebih gelap */
        font-size: 1.1rem;
        font-weight: 600;
        text-align: center; /* Teks di tengah */
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05); /* Inner shadow */
    }
    
    .quantity-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2), inset 0 1px 3px rgba(0, 0, 0, 0.1); /* Efek fokus yang kuat */
        background: #f3f4f6; /* Latar belakang lebih terang saat fokus */
    }
    
    /* Button Styles */
    .add-to-cart-button {
        width: 100%;
        background: #1e3a8a; /* Biru dongker */
        color: white;
        font-weight: 700; /* Lebih tebal */
        font-size: 1.25rem; /* Lebih besar */
        padding: 1.25rem 1.75rem; /* Padding lebih besar */
        border: none;
        border-radius: 16px; /* Lebih bulat */
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94); /* Transisi lebih mulus */
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem; /* Jarak ikon-teks */
        text-transform: uppercase;
        letter-spacing: 0.05em; /* Jarak huruf */
        position: relative;
        overflow: hidden;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    
    .add-to-cart-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -120%; /* Mulai lebih jauh */
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent); /* Kilau lebih kuat */
        transition: left 0.6s ease-out; /* Transisi lebih lambat */
        transform: skewX(-20deg); /* Efek miring pada kilauan */
    }
    
    .add-to-cart-button:hover {
        background: #3b82f6; /* Biru lebih terang saat hover */
        transform: translateY(-3px); /* Naik lebih tinggi */
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2), 0 0 0 6px rgba(59, 130, 246, 0.1); /* Glow biru saat hover */
    }
    
    .add-to-cart-button:active {
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    /* Login Notice */
    .login-notice {
        background: #fff; /* Putih */
        border: 1px solid #d1d5db; /* Border abu-abu lembut */
        border-radius: 20px;
        padding: 3rem; /* Padding lebih besar */
        text-align: center;
        transition: all 0.4s ease-out;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.8s ease-out; /* Animasi masuk */
    }
    
    .login-notice:hover {
        border-color: #3b82f6;
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2), 0 0 0 5px rgba(59, 130, 246, 0.1); /* Glow biru */
    }
    
    .login-icon {
        width: 72px; /* Lebih besar */
        height: 72px; /* Lebih besar */
        background: #1e3a8a; /* Biru dongker */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem; /* Jarak lebih besar */
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1), 0 0 0 4px rgba(59, 130, 246, 0.1); /* Shadow dan glow */
    }
    
    .login-text {
        font-size: 1.25rem; /* Lebih besar */
        color: #4b5563; /* Warna teks lebih gelap */
        line-height: 1.7;
        font-weight: 300;
    }
    
    .login-link {
        color: #3b82f6; /* Biru */
        text-decoration: none;
        font-weight: 700; /* Lebih tebal */
        transition: color 0.3s ease, border-bottom-color 0.3s ease;
        border-bottom: 2px solid transparent; /* Garis bawah lebih tebal */
        padding-bottom: 2px;
        letter-spacing: 0.02em;
    }
    
    .login-link:hover {
        color: #60a5fa; /* Biru lebih terang saat hover */
        border-bottom-color: #3b82f6;
    }
    
    /* Icon Styles */
    .cart-icon {
        width: 28px; /* Lebih besar */
        height: 28px; /* Lebih besar */
        stroke: white; /* Ikon putih */
        stroke-width: 2;
        transition: transform 0.3s ease;
    }
    .add-to-cart-button:hover .cart-icon {
        transform: rotate(5deg) scale(1.1); /* Sedikit putar dan zoom */
    }
    
    .user-icon {
        width: 36px; /* Lebih besar */
        height: 36px; /* Lebih besar */
        stroke: white; /* Ikon putih */
        stroke-width: 2;
    }
    
    /* Animasi Tambahan */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideInFromLeft {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    .fade-in {
        animation: fadeIn 0.8s ease-out forwards; /* Menggunakan forwards untuk menjaga keadaan akhir */
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .product-page {
            padding: 2rem 1rem;
        }
        
        .image-section,
        .content-section {
            padding: 2rem 1.5rem;
        }
        
        .product-title {
            font-size: 2.8rem;
        }
        
        .product-description {
            font-size: 1.1rem;
            padding-left: 1rem;
        }
        
        .price-amount {
            font-size: 3.5rem;
        }
        
        .price-section {
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .add-to-cart-button {
            font-size: 1.1rem;
            padding: 1rem 1.5rem;
            gap: 0.75rem;
        }

        .login-notice {
            padding: 2.5rem 1.5rem;
        }

        .login-icon {
            width: 60px;
            height: 60px;
            margin-bottom: 1.5rem;
        }
        .user-icon {
            width: 30px;
            height: 30px;
        }
        .login-text {
            font-size: 1rem;
        }
    }
    
    /* Accessibility */
    .quantity-input:focus,
    .add-to-cart-button:focus,
    .login-link:focus {
        outline: 3px solid #3b82f6; /* Outline yang lebih tebal */
        outline-offset: 3px;
        border-color: transparent; /* Hindari border ganda */
    }
    
    /* Print Styles */
    @media print {
        .product-page {
            background: white;
            color: black;
            padding: 1rem;
        }
        
        .product-card {
            box-shadow: none;
            border: 1px solid #ccc;
            background: white;
        }
        
        .image-section, .content-section, .price-section, .login-notice {
            background: none;
            border: none;
            padding: 0.5rem;
            box-shadow: none;
            backdrop-filter: none;
        }

        .product-title, .price-amount {
            -webkit-text-fill-color: black;
            background: none;
            color: black;
            text-shadow: none;
        }
        
        .add-to-cart-button,
        .login-notice .login-icon,
        .login-notice .login-link { /* Sembunyikan elemen interaktif di cetak */
            display: none;
        }
        .product-image {
            box-shadow: none;
            border: 1px solid #eee;
        }
        .product-description, .login-text {
            color: #333;
        }
        .price-currency {
            color: #666;
        }
    }
</style>

<div class="product-page">
    <div class="product-card fade-in">
        <div class="product-grid">
            <div class="image-section">
                <div class="image-container">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}"
                         class="product-image"
                         loading="lazy">
                </div>
            </div>

            <div class="content-section">
                <h1 class="product-title">{{ $product->name }}</h1>
                
                <p class="product-description">{{ $product->description }}</p>

                <div class="price-section">
                    <div class="price-display">
                        <span class="price-currency">Rp</span>
                        <span class="price-amount">{{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>
                </div>

                @auth
                <form action="{{ route('keranjang.tambah') }}" method="POST" class="purchase-form">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="quantity-group">
                        <label for="jumlah" class="quantity-label">Jumlah Pembelian</label>
                        <input type="number" 
                               name="jumlah" 
                               id="jumlah" 
                               min="1" 
                               value="1" 
                               required
                               class="quantity-input"
                               aria-describedby="quantity-help">
                    </div>

                    <button type="submit" class="add-to-cart-button" aria-label="Tambah produk ke keranjang">
                        <svg class="cart-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4z">
                            </path>
                        </svg>
                        <span>Tambah ke Keranjang</span>
                    </button>
                </form>
                @else
                <div class="login-notice">
                    <div class="login-icon">
                        <svg class="user-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                            </path>
                        </svg>
                    </div>
                    <p class="login-text">
                        Silakan 
                        <a href="{{ route('login') }}" class="login-link">masuk ke akun Anda</a> 
                        terlebih dahulu untuk dapat membeli produk ini.
                    </p>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection