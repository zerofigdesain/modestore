@extends('layouts.app')

@section('title', 'Portofolio - Mitologi Clothing')

@section('content')
<style>
    /* Global Styles & Resets */
    body {
        font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins untuk kesan modern dan elegan */
        background-color: #f0f2f5; /* Abu-abu terang sebagai latar belakang dasar */
        color: #333; /* Warna teks dasar yang netral */
        line-height: 1.6;
    }

    /* Page Container */
    .portfolio-container {
        padding: 60px 20px; /* Padding atas bawah lebih besar */
        max-width: 1200px; /* Lebar maksimal konten */
        margin: 0 auto; /* Tengah secara horizontal */
        background-color: #ffffff; /* Latar belakang putih bersih untuk kontainer utama */
        border-radius: 15px; /* Sudut membulat yang lembut */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); /* Bayangan lembut untuk efek melayang */
        animation: fadeInScale 0.8s ease-out; /* Animasi muncul */
    }

    /* Heading & Paragraph */
    .portfolio-header {
        text-align: center;
        margin-bottom: 50px; /* Jarak bawah yang cukup */
    }

    .portfolio-header h2 {
        font-size: 3.2rem; /* Ukuran font lebih besar */
        font-weight: 800; /* Lebih tebal */
        color: #1a202c; /* Hampir hitam untuk judul utama */
        margin-bottom: 15px;
        position: relative;
        display: inline-block; /* Agar bisa menambahkan pseudo-element di bawah */
        letter-spacing: -0.5px; /* Jarak antar huruf sedikit rapat */
    }

    .portfolio-header h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px; /* Garis bawah yang elegan */
        height: 4px;
        background-color: #007bff; /* Biru terang sebagai aksen */
        border-radius: 2px;
    }

    .portfolio-header p {
        font-size: 1.2rem; /* Ukuran font lebih besar */
        color: #555; /* Abu-abu gelap */
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.8;
    }

    /* Row for Portfolio Items */
    .portfolio-row {
        display: flex;
        flex-wrap: wrap;
        gap: 30px; /* Jarak antar kolom */
        justify-content: center; /* Tengah secara horizontal */
    }

    /* Card Styling */
    .portfolio-item {
        flex: 1 1 calc(33.333% - 30px); /* 3 kolom di desktop, dengan gap */
        min-width: 300px; /* Lebar minimum agar tidak terlalu kecil */
        max-width: 380px; /* Lebar maksimum per kartu */
        background-color: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1); /* Bayangan lebih jelas */
        transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), 
                    box-shadow 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        position: relative;
        border: 1px solid #e0e0e0; /* Border abu-abu tipis */
    }

    .portfolio-item:hover {
        transform: translateY(-8px); /* Efek mengangkat yang lebih terasa */
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.18); /* Bayangan lebih kuat saat hover */
    }

    .portfolio-item img {
        width: 100%;
        height: 250px; /* Tinggi gambar yang konsisten */
        object-fit: cover; /* Memastikan gambar mengisi area tanpa distorsi */
        border-bottom: 1px solid #eee; /* Garis pemisah gambar dan konten */
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .portfolio-item:hover img {
        transform: scale(1.05); /* Sedikit zoom pada gambar saat hover */
    }

    .portfolio-body {
        padding: 25px; /* Padding di dalam card */
        text-align: left;
    }

    .portfolio-body h5 {
        font-size: 1.6rem; /* Ukuran judul card */
        font-weight: 700;
        color: #1a202c; /* Warna judul card */
        margin-bottom: 10px;
        transition: color 0.3s ease;
    }
    
    .portfolio-item:hover .portfolio-body h5 {
        color: #007bff; /* Warna biru saat hover pada judul */
    }

    .portfolio-body p {
        font-size: 1rem;
        color: #666; /* Warna deskripsi card */
        line-height: 1.7;
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .portfolio-item {
            flex: 1 1 calc(50% - 30px); /* 2 kolom di tablet */
            max-width: unset; /* Lepaskan max-width untuk fleksibilitas */
        }
        .portfolio-header h2 {
            font-size: 2.5rem;
        }
        .portfolio-header p {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 768px) {
        .portfolio-container {
            padding: 40px 15px;
            border-radius: 0; /* Tanpa border-radius di mobile penuh */
            box-shadow: none; /* Tanpa shadow di mobile */
        }
        .portfolio-row {
            gap: 20px; /* Jarak antar kolom lebih kecil di mobile */
        }
        .portfolio-item {
            flex: 1 1 100%; /* 1 kolom di mobile */
        }
        .portfolio-header h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .portfolio-header h2::after {
            width: 60px;
            bottom: -5px;
        }
        .portfolio-header p {
            font-size: 1rem;
        }
        .portfolio-body {
            padding: 20px;
        }
        .portfolio-body h5 {
            font-size: 1.4rem;
        }
    }

    /* Keyframe Animations */
    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

</style>

<div class="portfolio-container">
    <div class="portfolio-header">
        <h2>Portofolio Kami</h2>
        <p>Lihat beberapa hasil pekerjaan terbaik kami yang menunjukkan kualitas dan dedikasi Mitologi Clothing dalam setiap proyek. Dari seragam korporat hingga merchandise event, kami mewujudkan visi Anda.</p>
    </div>

    <div class="portfolio-row">
        <div class="portfolio-item">
            <img src="{{ asset('images/portfolio/seragam_kantor_xyz.jpg') }}" class="card-img-top" alt="Seragam Kantor XYZ">
            <div class="portfolio-body">
                <h5 class="card-title">Seragam Kantor XYZ</h5>
                <p class="card-text">Pembuatan seragam kemeja dan polo dengan desain profesional untuk citra elegan perusahaan XYZ.</p>
            </div>
        </div>

        <div class="portfolio-item">
            <img src="{{ asset('images/portfolio/kaos_event_musik.png') }}" class="card-img-top" alt="Kaos Event Musik">
            <div class="portfolio-body">
                <h5 class="card-title">Kaos Event Musik</h5>
                <p class="card-text">Produksi kaos eksklusif dengan kualitas sablon premium untuk event musik lokal di Indramayu.</p>
            </div>
        </div>

        <div class="portfolio-item">
            <img src="{{ asset('images/portfolio/jaket_angkatan_kampus.jpg') }}" class="card-img-top" alt="Jaket Angkatan Kampus">
            <div class="portfolio-body">
                <h5 class="card-title">Jaket Angkatan Kampus</h5>
                <p class="card-text">Jaket custom stylish dan nyaman, dirancang khusus untuk angkatan mahasiswa di berbagai universitas.</p>
            </div>
        </div>

        <div class="portfolio-item">
            <img src="{{ asset('images/portfolio/merchandise_komunitas.png') }}" class="card-img-top" alt="Merchandise Komunitas">
            <div class="portfolio-body">
                <h5 class="card-title">Merchandise Komunitas</h5>
                <p class="card-text">Produksi berbagai merchandise seperti hoodie, topi, dan lanyard untuk kebutuhan komunitas.</p>
            </div>
        </div>

        <div class="portfolio-item">
            <img src="{{ asset('images/portfolio/pakaian_promosi_retail.jpg') }}" class="card-img-top" alt="Pakaian Promosi Retail">
            <div class="portfolio-body">
                <h5 class="card-title">Pakaian Promosi Retail</h5>
                <p class="card-text">Pembuatan pakaian promosi dengan branding kuat untuk kampanye retail dan peluncuran produk.</p>
            </div>
        </div>
        
        <div class="portfolio-item">
            <img src="{{ asset('images/polo.png') }}" class="card-img-top" alt="Seragam Kantor XYZ">
            <div class="portfolio-body">
                <h5 class="card-title">Jersey Olahraga Kustom</h5>
                <p class="card-text">Jersey olahraga custom dengan material berkualitas tinggi dan desain dinamis untuk tim dan klub.</p>
            </div>
        </div>
    </div>
</div>
@endsection