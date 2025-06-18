@extends('layouts.app')

@section('title', 'Home - Mitologi Clothing')

@section('content')
<style>
    /* Import Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&family=Poppins:wght@300;400;500;600;700&display=swap');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

    /* Variabel CSS untuk Konsistensi */
    :root {
        --color-primary: #1A2A40;
        --color-secondary: #0A1520;
        --color-accent: #3498db;
        --color-light: #F8F8F8;
        --color-gray-bg: #E0E0E0;
        --color-gray-text: #555555;
        --color-gray-subtle: #777777;
        --color-dark: #222222;

        --border-radius-md: 12px;
        --border-radius-lg: 20px;
        --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.08);
        --shadow-md: 0 8px 20px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 12px 30px rgba(0, 0, 0, 0.15);
        --shadow-hover: 0 10px 25px rgba(0, 0, 0, 0.15);

        --transition-speed: 0.3s;
        --transition-ease: cubic-bezier(0.25, 0.46, 0.45, 0.94);

        --font-heading: 'Montserrat', sans-serif;
        --font-body: 'Poppins', sans-serif;
    }

    /* Global Styles */
    body {
        font-family: var(--font-body);
        overflow-x: hidden;
        line-height: 1.6;
    }

    /* Hero Section (Jumbotron) - Perbaikan Layout */
    .hero-section {
        background: linear-gradient(135deg, var(--color-light) 0%, var(--color-gray-bg) 100%);
        color: var(--color-gray-text);
        padding: 6rem 2rem 8rem;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-md);
        margin: 2rem auto 4rem;
        max-width: 1200px;
        position: relative;
        overflow: hidden;
        text-align: center;
        border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg,
                transparent 0%,
                rgba(52, 152, 219, 0.1) 25%,
                transparent 50%,
                rgba(52, 152, 219, 0.1) 75%,
                transparent 100%);
        animation: shimmer 15s ease-in-out infinite;
        z-index: 0;
    }

    @keyframes shimmer {
        0%, 100% { transform: translateX(-100%) translateY(-100%); }
        50% { transform: translateX(100%) translateY(100%); }
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        margin: 0 auto;
    }

    .hero-section h1 {
        font-family: var(--font-heading);
        font-size: 3.5rem;
        font-weight: 900;
        color: var(--color-primary);
        margin-bottom: 1.5rem;
        letter-spacing: -0.02em;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .hero-section .lead {
        font-size: 1.4rem;
        color: var(--color-gray-text);
        margin-bottom: 2rem;
        font-weight: 400;
    }

    .hero-divider {
        width: 80px;
        height: 3px;
        background: var(--color-primary);
        border: none;
        margin: 2rem auto;
        border-radius: 2px;
    }

    .hero-description {
        font-size: 1.1rem;
        color: var(--color-gray-subtle);
        margin-bottom: 3rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Button Group dalam Hero */
    .hero-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        justify-content: center;
        align-items: center;
        margin-top: 2rem;
    }

    .hero-buttons .btn {
        padding: 1rem 2.5rem;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: var(--border-radius-md);
        transition: all var(--transition-speed) var(--transition-ease);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background-color: var(--color-primary);
        border-color: var(--color-primary);
        color: white;
        box-shadow: var(--shadow-sm);
    }

    .btn-primary:hover {
        background-color: var(--color-secondary);
        border-color: var(--color-secondary);
        transform: translateY(-3px);
        box-shadow: var(--shadow-hover);
    }

    .btn-secondary {
        background-color: transparent;
        border: 2px solid var(--color-gray-text);
        color: var(--color-gray-text);
    }

    .btn-secondary:hover {
        background-color: var(--color-gray-text);
        color: white;
        transform: translateY(-3px);
    }

    /* User Greeting - Perbaikan Layout */
    .user-greeting {
        background: linear-gradient(135deg, var(--color-accent), var(--color-primary));
        color: white;
        padding: 1.5rem;
        border-radius: var(--border-radius-md);
        margin: 2rem 0;
        text-align: center;
        box-shadow: var(--shadow-sm);
    }

    .user-greeting h3 {
        font-size: 1.3rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .user-greeting .btn {
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        backdrop-filter: blur(10px);
    }

    /* About Section - Perbaikan Layout */
    .about-section {
        padding: 5rem 0;
        background: white;
    }

    .about-content {
        display: flex;
        align-items: center;
        gap: 4rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .about-image {
        flex: 1;
        min-width: 300px;
    }

    .about-image img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-md);
        transition: transform var(--transition-speed) var(--transition-ease);
    }

    .about-image img:hover {
        transform: scale(1.03) rotateZ(1deg);
    }

    .about-text {
        flex: 1;
    }

    .about-text p {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--color-gray-text);
        margin-bottom: 1.5rem;
        text-align: justify;
    }

    /* Section Headings */
    .section-heading {
        font-family: var(--font-heading);
        font-size: 2.8rem;
        font-weight: 900;
        color: var(--color-primary);
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
        padding-bottom: 1rem;
    }

    .section-heading::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 4px;
        background: linear-gradient(to right, var(--color-primary), var(--color-accent));
        border-radius: 2px;
    }

    /* Features Section - Grid Layout yang Lebih Baik */
    .features-section {
        padding: 5rem 0;
        background: var(--color-light);
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .feature-card {
        background: white;
        border-radius: var(--border-radius-lg);
        padding: 3rem 2rem;
        text-align: center;
        box-shadow: var(--shadow-sm);
        transition: all var(--transition-speed) var(--transition-ease);
        border: 1px solid rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--color-primary);
        transform: scaleX(0);
        transition: transform var(--transition-speed) var(--transition-ease);
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
    }

    .feature-card:hover::before {
        transform: scaleX(1);
    }

    .feature-icon {
        font-size: 4rem;
        color: var(--color-accent);
        margin-bottom: 1.5rem;
        transition: all var(--transition-speed) var(--transition-ease);
    }

    .feature-card:hover .feature-icon {
        color: var(--color-primary);
        transform: scale(1.1) rotateY(15deg);
    }

    .feature-card h5 {
        font-family: var(--font-heading);
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--color-primary);
        margin-bottom: 1rem;
    }

    .feature-card p {
        color: var(--color-gray-text);
        font-size: 1rem;
        line-height: 1.6;
    }

    /* Testimonials Section - Card Layout yang Diperbaiki */
    .testimonials-section {
        padding: 5rem 0;
        background: white;
    }

    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .testimonial-card {
        background: var(--color-light);
        border-radius: var(--border-radius-lg);
        padding: 2.5rem;
        text-align: center;
        box-shadow: var(--shadow-sm);
        transition: all var(--transition-speed) var(--transition-ease);
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .testimonial-card::before {
        content: '';
        position: absolute;
        top: -10px;
        right: -10px;
        width: 60px;
        height: 60px;
        background: var(--color-accent);
        border-radius: 50%;
        opacity: 0.1;
        transition: all var(--transition-speed) var(--transition-ease);
    }

    .testimonial-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-md);
    }

    .testimonial-card:hover::before {
        transform: scale(1.5);
        opacity: 0.15;
    }

    .quote-icon {
        font-size: 3rem;
        color: var(--color-accent);
        margin-bottom: 1.5rem;
        opacity: 0.8;
    }

    .testimonial-text {
        font-style: italic;
        color: var(--color-gray-text);
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }

    .testimonial-author {
        font-weight: 700;
        color: var(--color-primary);
        font-size: 1rem;
    }

    /* CTA Section - Layout yang Diperbaiki */
    .cta-section {
        background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
        color: white;
        padding: 5rem 2rem;
        text-align: center;
        margin: 4rem auto;
        max-width: 1200px;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: pulse 8s ease-in-out infinite;
        z-index: 0;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1) rotate(0deg); }
        50% { transform: scale(1.1) rotate(180deg); }
    }

    .cta-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }

    .cta-section h2 {
        font-family: var(--font-heading);
        font-size: 2.8rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .cta-section p {
        font-size: 1.2rem;
        margin-bottom: 2.5rem;
        opacity: 0.95;
    }

    .cta-button {
        background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(255,255,255,0.8));
        color: var(--color-primary);
        border: none;
        padding: 1.2rem 3rem;
        font-size: 1.2rem;
        font-weight: 700;
        border-radius: var(--border-radius-md);
        transition: all var(--transition-speed) var(--transition-ease);
        box-shadow: var(--shadow-sm);
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
        text-decoration: none;
    }

    .cta-button:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: var(--shadow-hover);
        color: var(--color-primary);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-section {
            padding: 4rem 1.5rem 5rem;
            margin: 1rem auto 3rem;
        }

        .hero-section h1 {
            font-size: 2.5rem;
        }

        .hero-section .lead {
            font-size: 1.2rem;
        }

        .hero-buttons {
            flex-direction: column;
            align-items: stretch;
        }

        .hero-buttons .btn {
            width: 100%;
            justify-content: center;
        }

        .about-content {
            flex-direction: column;
            gap: 2rem;
        }

        .about-image {
            min-width: auto;
        }

        .about-image img {
            height: 250px;
        }

        .features-grid,
        .testimonials-grid {
            grid-template-columns: 1fr;
            padding: 0 1rem;
        }

        .section-heading {
            font-size: 2.2rem;
        }

        .cta-section {
            padding: 3rem 1.5rem;
            margin: 3rem auto;
        }

        .cta-section h2 {
            font-size: 2rem;
        }
    }

    @media (max-width: 480px) {
        .hero-section h1 {
            font-size: 2rem;
        }

        .hero-section .lead {
            font-size: 1rem;
        }

        .hero-description {
            font-size: 0.95rem;
        }

        .section-heading {
            font-size: 1.8rem;
        }

        .feature-card,
        .testimonial-card {
            padding: 2rem 1.5rem;
        }

        .cta-section h2 {
            font-size: 1.6rem;
        }

        .cta-section p {
            font-size: 1rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <h1>Selamat Datang di Mitologi Clothing!</h1>
        <p class="lead">Solusi terbaik untuk kebutuhan konveksi Anda di Indramayu.</p>
        
        <hr class="hero-divider">
        
        @auth
        <div class="user-greeting">
            <h3>Halo, {{ Auth::user()->name }}!</h3>
            <p>Senang melihat Anda kembali. Mari jelajahi koleksi terbaru kami.</p>
            <a href="{{ route('profile') }}" class="btn">
                <i class="fas fa-user"></i> Lihat Profil Anda
            </a>
        </div>
        @else
        <p class="hero-description">
            Kami menawarkan berbagai produk konveksi berkualitas tinggi, mulai dari kaos, jaket, hingga seragam. 
            Silakan masuk atau daftar untuk pengalaman berbelanja yang lebih baik.
        </p>
        
        <div class="hero-buttons">
            <a href="{{ route('login') }}" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            <a href="{{ route('register') }}" class="btn btn-secondary">
                <i class="fas fa-user-plus"></i> Daftar
            </a>
        </div>
        @endauth
        
        <div class="hero-buttons" style="margin-top: 3rem;">
            <a href="{{ url('/produk') }}" class="btn btn-primary">
                <i class="fas fa-shopping-bag"></i> Jelajahi Produk Kami
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <h2 class="section-heading">Tentang Kami</h2>
        <div class="about-content">
            <div class="about-image">
                <img src="{{ asset('images/yunani.jpg') }}" alt="Tentang Mitologi Clothing">
            </div>
            <div class="about-text">
                <p><strong>MITOLOGI CLOTHING</strong> merupakan sebuah vendor, brand, sekaligus broker asal Kabupaten Indramayu yang berdiri sejak tahun 2022. Kami memproduksi berbagai macam seragam untuk organisasi maupun instansi.</p>
                
                <p>Mitologi memiliki kantor produksi di: <em>Jl. Lama Blok Pasar Senggol, Desa Leuwigede, Kecamatan Widasari, Kabupaten Indramayu, Jawa Barat, Indonesia.</em></p>
                
                <p>Kami memproduksi berbagai produk seperti <strong>Kemeja, Kaos, Jaket, Baju Seragam, Baju Komunitas, Jaket Custom, Official Merchandise, Topi, dan lain-lain</strong>. Semua dikelola oleh tim yang berpengalaman dan menggunakan peralatan dengan standar operasional yang baik.</p>
                
                <a href="{{ url('/about-us') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right"></i> Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <h2 class="section-heading">Mengapa Memilih Kami?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-gem feature-icon"></i>
                <h5>Kualitas Premium</h5>
                <p>Kami menggunakan bahan terbaik dan proses produksi cermat untuk hasil yang tahan lama dan nyaman.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-dollar-sign feature-icon"></i>
                <h5>Harga Kompetitif</h5>
                <p>Dapatkan produk berkualitas tinggi dengan penawaran harga yang transparan dan bersaing.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-palette feature-icon"></i>
                <h5>Desain Kustom</h5>
                <p>Wujudkan ide kreatif Anda dengan layanan desain kustom dari tim ahli kami.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <h2 class="section-heading">Apa Kata Pelanggan Kami?</h2>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <i class="fas fa-quote-right quote-icon"></i>
                <p class="testimonial-text">"Mitologi Clothing benar-benar melebihi ekspektasi saya! Kualitas kaosnya top banget, desainnya persis yang saya mau. Recommended!"</p>
                <p class="testimonial-author">- Budi Santoso</p>
            </div>
            <div class="testimonial-card">
                <i class="fas fa-quote-right quote-icon"></i>
                <p class="testimonial-text">"Proses pemesanan mudah, pelayanan ramah, dan hasilnya jaket komunitas kami sangat keren. Terima kasih Mitologi Clothing!"</p>
                <p class="testimonial-author">- Komunitas Sepeda Indramayu</p>
            </div>
            <div class="testimonial-card">
                <i class="fas fa-quote-right quote-icon"></i>
                <p class="testimonial-text">"Seragam kantor kami dibuat di sini dan semua karyawan sangat puas. Bahan nyaman, jahitan rapi, dan terlihat profesional."</p>
                <p class="testimonial-author">- PT. Maju Jaya Bersama</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-content">
        <h2>Siap Wujudkan Kebutuhan Konveksi Anda?</h2>
        <p>Jangan tunda lagi! Hubungi kami sekarang untuk mendapatkan penawaran terbaik dan diskusikan proyek Anda bersama tim ahli kami.</p>
        <a href="{{ url('/contact') }}" class="cta-button">
            <i class="fas fa-phone-alt"></i>
            Hubungi Kami Sekarang
        </a>
    </div>
</section>

@endsection