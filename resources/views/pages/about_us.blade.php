@extends('layouts.app')

@section('title', 'Tentang Kami - Mitologi Clothing')

@section('content')
    <style>
        /* Umum */
        body {
            background-color: #f0f2f5; /* Latar belakang lembut untuk kesan bersih */
            font-family: 'Poppins', sans-serif; /* Menggunakan font modern */
            color: #333;
        }

        /* Bagian Utama 'Tentang Kami' */
        .about-section {
            background-color: #ffffff; /* Putih bersih sebagai dasar */
            border-radius: 15px; /* Sudut lebih membulat untuk kelembutan */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); /* Bayangan lebih tegas namun tetap elegan */
            padding: 60px; /* Padding lebih luas */
            margin-top: 50px;
            margin-bottom: 50px;
            overflow: hidden; /* Mengatasi potensi overflow */
            position: relative;
            z-index: 1;
        }

        /* Efek Latar Belakang (Opsional, untuk sentuhan ekstra) */
        .about-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 64, 133, 0.03) 0%, rgba(255, 255, 255, 0) 70%); /* Gradient lembut biru dongker */
            z-index: -1;
            border-radius: 15px;
        }

        /* Judul Halaman */
        .about-section h2 {
            color: #1a1a1a; /* Hitam pekat untuk judul */
            font-weight: 800; /* Lebih tebal dari sebelumnya */
            margin-bottom: 30px;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
            font-size: 2.8em; /* Ukuran judul lebih besar */
        }
        .about-section h2::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 100px; /* Garis bawah lebih panjang */
            height: 5px; /* Lebih tebal */
            background-color: #004085; /* Biru dongker sebagai aksen utama */
            border-radius: 3px;
        }

        /* Paragraf Utama (Lead) */
        .about-section p.lead {
            font-weight: 500; /* Tidak terlalu tebal */
            color: #444; /* Abu-abu gelap */
            font-size: 1.25em; /* Lebih besar dari paragraf biasa */
            text-align: center;
            margin-bottom: 40px;
            line-height: 1.9;
        }

        /* Paragraf Biasa */
        .about-section p {
            color: #555; /* Abu-abu sedang */
            line-height: 2; /* Jarak baris lebih lega */
            margin-bottom: 25px;
            font-size: 1.1em;
            text-align: justify; /* Teks rata kanan-kiri untuk kerapian */
        }

        /* Teks yang Disorot */
        .highlight-text {
            color: #004085; /* Biru dongker untuk penekanan */
            font-weight: 700;
        }
        .product-list {
            color: #2c3e50; /* Abu-abu kebiruan gelap */
            font-weight: 600;
        }

        /* Alamat */
        address {
            font-style: normal;
            margin-top: 25px;
            padding-left: 30px;
            border-left: 6px solid #004085; /* Garis vertikal biru dongker yang lebih tegas */
            color: #333;
            font-size: 1.1em;
            line-height: 1.8;
            background-color: #f9f9f9; /* Latar belakang sedikit berbeda untuk alamat */
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.03); /* Bayangan inset halus */
        }
        address strong {
            color: #1a1a1a;
            display: block; /* Memastikan alamat baru di baris baru */
            margin-bottom: 5px;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="about-section">
                    <h2>Tentang <span class="highlight-text">Mitologi Clothing</span></h2>

                    <p class="lead">
                        <span class="highlight-text">MITOLOGI CLOTHING</span> merupakan sebuah vendor, brand, sekaligus broker asal Kabupaten Indramayu yang berdiri sejak tahun 2022. Kami memproduksi berbagai macam seragam untuk organisasi maupun instansi.
                    </p>

                    <p>
                        Mitologi memiliki kantor produksi di: <br>
                        <address>
                            <strong>Jl. Lama Blok Pasar Senggol, Desa Leuwigede, Kecamatan Widasari, Kabupaten Indramayu, Jawa Barat, Indonesia.</strong>
                        </address>
                    </p>

                    <p>
                        Kami memproduksi berbagai produk seperti <span class="product-list">Kemeja, Kaos, Jaket, Baju Seragam, Baju Komunitas, Jaket Custom, Official Merchandise, Topi, dan lain-lain</span>. Semua dikelola oleh tim yang berpengalaman dan menggunakan peralatan dengan standar operasional yang baik.
                    </p>

                    <p>
                        Mitologi berdiri atas dasar cerita intrinsik, kerja keras, dan kerja cerdas. Kami terus melakukan evaluasi dan pembaruan untuk memberikan hasil terbaik sesuai keinginan pelanggan.
                    </p>

                    <p>
                        Seiring berjalannya waktu, Mitologi bertransformasi menjadi entitas yang memfasilitasi industri maupun event organizer dalam kebutuhan produk merchandise.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Baris di bawah ini tidak diperlukan lagi karena tidak ada ikon yang digunakan --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> --}}
@endsection