@extends('layouts.app')

@section('title', 'Cara Order - Mitologi Clothing')

@section('content')
    <div class="container py-5 px-lg-5"> {{-- Menambah padding horizontal untuk layar besar --}}
        <h2 class="mb-4 text-center fw-bold display-4 text-dark-blue position-relative"> {{-- Ukuran judul lebih besar --}}
            <span class="d-inline-block border-bottom border-accent-blue border-4 pb-2 px-3">Panduan Order Mitologi Clothing</span> {{-- Garis bawah lebih tebal, sedikit padding horizontal --}}
            {{-- SUB-JUDUL YANG DISESUAIKAN UNTUK AUDIENS TERPUKAU --}}
            <small class="d-block mt-3 lh-base headline-subtitle">Proses Mudah, Hasil Memukau untuk Kebutuhan Fashion Anda</small>
        </h2>

        <p class="text-center lead text-dark-gray mb-5 px-lg-5 mx-auto" style="max-width: 800px;">
            Ikuti panduan langkah demi langkah kami yang sederhana ini untuk mendapatkan produk fashion kustom berkualitas terbaik dari Mitologi Clothing.
        </p>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="timeline-container">
                    {{-- Langkah 1 --}}
                    <div class="timeline-item left">
                        <div class="timeline-icon bg-accent-blue text-white shadow-sm">
                            <i class="bi bi-person-circle"></i> {{-- Ikon lebih umum untuk kontak --}}
                        </div>
                        <div class="timeline-content card shadow-lg border-0 rounded-lg"> {{-- Bayangan lebih kuat --}}
                            <div class="card-body p-4 p-md-5"> {{-- Padding lebih besar --}}
                                <h5 class="card-title fw-bolder text-dark-blue mb-2">1. Jalin Kontak dengan Admin</h5>
                                <p class="card-text text-secondary mb-0">Awali proses order Anda dengan menghubungi tim admin kami. Kami akan dengan senang hati menyimpan nomor Anda untuk kelancaran komunikasi. Kesempatan pertama untuk mengenal Mitologi Clothing!</p>
                            </div>
                        </div>
                    </div>

                    {{-- Langkah 2 --}}
                    <div class="timeline-item right">
                        <div class="timeline-icon bg-accent-blue text-white shadow-sm">
                            <i class="bi bi-chat-text"></i> {{-- Ikon chat lebih direct --}}
                        </div>
                        <div class="timeline-content card shadow-lg border-0 rounded-lg">
                            <div class="card-body p-4 p-md-5">
                                <h5 class="card-title fw-bolder text-dark-blue mb-2">2. Diskusi & Konsultasi Mendalam</h5>
                                <p class="card-text text-secondary mb-0">Ceritakan visi dan detail kebutuhan pesanan Anda secara lengkap. Tim kami siap memberikan konsultasi ahli, menjelaskan spesifikasi, dan merekomendasikan opsi terbaik yang selaras dengan impian Anda.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Langkah 3 --}}
                    <div class="timeline-item left">
                        <div class="timeline-icon bg-accent-blue text-white shadow-sm">
                            <i class="bi bi-file-earmark-spreadsheet"></i> {{-- Ikon spreadsheet/invoice --}}
                        </div>
                        <div class="timeline-content card shadow-lg border-0 rounded-lg">
                            <div class="card-body p-4 p-md-5">
                                <h5 class="card-title fw-bolder text-dark-blue mb-2">3. Konfirmasi Pesanan & Invoice</h5>
                                <p class="card-text text-secondary mb-0">Setelah semua detail dan harga disepakati, kami akan segera menerbitkan invoice resmi. Ini adalah langkah validasi pesanan Anda menuju tahap produksi.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Langkah 4 --}}
                    <div class="timeline-item right">
                        <div class="timeline-icon bg-accent-blue text-white shadow-sm">
                            <i class="bi bi-wallet2"></i>
                        </div>
                        <div class="timeline-content card shadow-lg border-0 rounded-lg">
                            <div class="card-body p-4 p-md-5">
                                <h5 class="card-title fw-bolder text-dark-blue mb-2">4. Pembayaran Uang Muka (DP)</h5>
                                <p class="card-text text-secondary mb-0">Untuk memulai pengerjaan proyek Anda, mohon lakukan pembayaran uang muka (DP) sebesar 50%. Ini menjadi tanda persetujuan Anda dan aktivasi proses produksi.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Langkah 5 --}}
                    <div class="timeline-item left">
                        <div class="timeline-icon bg-accent-blue text-white shadow-sm">
                            <i class="bi bi-person-workspace"></i> {{-- Ikon pekerja --}}
                        </div>
                        <div class="timeline-content card shadow-lg border-0 rounded-lg">
                            <div class="card-body p-4 p-md-5">
                                <h5 class="card-title fw-bolder text-dark-blue mb-2">5. Tahap Produksi Penuh Dedikasi</h5>
                                <p class="card-text text-secondary mb-0">Tim produksi kami akan segera bekerja dengan penuh dedikasi dan perhatian terhadap detail, memastikan setiap jahitan dan desain terwujud sempurna sesuai standar kualitas Mitologi Clothing.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Langkah 6 --}}
                    <div class="timeline-item right">
                        <div class="timeline-icon bg-accent-blue text-white shadow-sm">
                            <i class="bi bi-binoculars"></i> {{-- Ikon untuk melihat/review --}}
                        </div>
                        <div class="timeline-content card shadow-lg border-0 rounded-lg">
                            <div class="card-body p-4 p-md-5">
                                <h5 class="card-title fw-bolder text-dark-blue mb-2">6. Preview Hasil & Sesi Revisi</h5>
                                <p class="card-text text-secondary mb-0">Kami akan menampilkan hasil pengerjaan awal untuk Anda tinjau. Kesempatan ini adalah momen krusial untuk memberikan masukan dan revisi agar hasil akhir benar-benar memuaskan dan sempurna.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Langkah 7 --}}
                    <div class="timeline-item left">
                        <div class="timeline-icon bg-accent-blue text-white shadow-sm">
                            <i class="bi bi-stars"></i> {{-- Ikon bintang untuk hasil terbaik --}}
                        </div>
                        <div class="timeline-content card shadow-lg border-0 rounded-lg">
                            <div class="card-body p-4 p-md-5">
                                <h5 class="card-title fw-bolder text-dark-blue mb-2">7. Penyelesaian Proyek Megah</h5>
                                <p class="card-text text-secondary mb-0">Selamat! Pesanan Anda telah rampung dan siap. Kami pastikan setiap produk yang Anda terima adalah karya terbaik yang mencerminkan kualitas superior dari Mitologi Clothing.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Langkah 8 --}}
                    <div class="timeline-item right">
                        <div class="timeline-icon bg-accent-blue text-white shadow-sm">
                            <i class="bi bi-truck"></i>
                        </div>
                        <div class="timeline-content card shadow-lg border-0 rounded-lg">
                            <div class="card-body p-4 p-md-5">
                                <h5 class="card-title fw-bolder text-dark-blue mb-2">8. Pelunasan & Pengiriman Aman</h5>
                                <p class="card-text text-secondary mb-0">Lakukan pelunasan sisa pembayaran, dan pesanan Anda akan segera kami kemas dan kirimkan dengan aman, siap untuk Anda nikmati!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 pt-5 border-top border-light-gray-2"> {{-- Padding top lebih besar --}}
            <h3 class="text-dark-blue fw-bold mb-3 display-6">Siap Mewujudkan Ide Terbaik Anda?</h3> {{-- Ukuran judul CTA lebih besar --}}
            <p class="lead text-dark-gray mb-4 mx-auto" style="max-width: 700px;">
                Jangan ragu untuk menghubungi kami. Tim profesional Mitologi Clothing siap membantu Anda menciptakan produk fashion kustom impian dengan standar kualitas kelas dunia.
            </p>
            <a href="{{ url('/contact') }}" class="btn btn-primary btn-lg custom-btn-blue shadow-lg px-5 py-3 rounded-pill"> {{-- Tombol lebih membulat --}}
                <i class="bi bi-whatsapp me-2"></i> Konsultasi Gratis Sekarang!
            </a>
            <p class="text-muted mt-3 mb-0 fs-6">Tim kami akan merespons dalam waktu 1x24 jam kerja.</p> {{-- Info tambahan --}}
        </div>
    </div>

    <style>
        /* Palet Warna */
        :root {
            --dark-blue: #1A2E40; /* Biru Dongker Tua */
            --navy: #2C3E50; /* Biru Dongker */
            --light-gray: #F8F9FA; /* Abu-abu Sangat Terang untuk background body */
            --light-gray-2: #E9ECEF; /* Abu-abu Sedang untuk garis pembatas */
            --dark-gray: #6C757D; /* Abu-abu Tua untuk teks sekunder */
            --white: #FFFFFF; /* Putih untuk latar belakang kartu */
            --accent-blue: #007BFF; /* Biru Aksen (Primary) */
            --accent-blue-dark: #0056b3; /* Biru Aksen lebih gelap untuk hover */
            --background-body: #F5F7FA; /* Latar belakang body sedikit lebih gelap dari light-gray */
            --subtitle-color: #495057; /* Disesuaikan: Warna baru untuk sub-judul, abu-abu gelap yang tegas */
        }

        body {
            background-color: var(--background-body);
            font-family: 'Poppins', sans-serif; /* Pastikan font ini di-link di _app.blade.php */
            color: var(--navy);
            line-height: 1.7; /* Menambah spasi baris untuk keterbacaan */
            -webkit-font-smoothing: antialiased; /* Anti-aliasing untuk font */
            -moz-osx-font-smoothing: grayscale; /* Anti-aliasing untuk font Firefox */
        }

        /* Umum */
        .fw-bolder { font-weight: 800 !important; } /* Lebih bold dari fw-bold */

        /* Judul Halaman */
        .display-4 {
            font-size: 3.8rem; /* Ukuran judul utama lebih besar */
            letter-spacing: -0.06em; /* Spasi antar huruf lebih rapat */
        }

        .pb-2 span {
            border-bottom: 5px solid var(--accent-blue); /* Garis bawah lebih tebal */
            padding-bottom: 10px; /* Jarak antara teks dan garis */
        }

        /* ----- SUB-JUDUL YANG DIUBAH TOTAL UNTUK LEBIH MEMUKAU ----- */
        .headline-subtitle {
            font-size: 1.6rem; /* Ukuran font lebih besar lagi untuk daya tarik */
            font-weight: 600; /* Semi-bold untuk kejelasan dan kekuatan */
            color: var(--subtitle-color); /* Warna abu-abu gelap baru yang lebih kontras */
            line-height: 1.4; /* Spasi baris yang lebih rapat untuk kesan padat */
            letter-spacing: 0.03em; /* Sedikit spasi antar huruf untuk keterbacaan premium */
            text-shadow: 0.5px 0.5px 1px rgba(0, 0, 0, 0.1); /* Bayangan teks super halus untuk definisi */
            animation: fadeInScale 1s ease-out forwards; /* Animasi muncul yang halus */
        }

        /* Animasi untuk sub-judul */
        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(10px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
        /* ----------------------------------------------------------- */

        /* Teks Pengantar */
        .lead {
            font-size: 1.15rem;
            line-height: 1.8;
        }

        .text-dark-blue { color: var(--dark-blue) !important; }
        .text-navy { color: var(--navy) !important; }
        .text-secondary { color: var(--dark-gray) !important; }
        .text-muted { color: #9AA7B6 !important; } /* Tetap gunakan Bootstrap's text-muted jika di tempat lain */

        /* Timeline Styling */
        .timeline-container {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 0; /* Padding vertikal lebih besar */
        }

        .timeline-container::after {
            content: '';
            position: absolute;
            width: 5px; /* Garis tengah timeline lebih tebal */
            background: linear-gradient(to bottom, var(--accent-blue), var(--dark-blue)); /* Gradient pada garis */
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -2.5px; /* Setengah dari lebar garis */
            border-radius: 3px;
        }

        .timeline-item {
            padding: 20px 0; /* Padding vertikal antar item */
            position: relative;
            width: 50%;
            opacity: 1; /* Default visible */
            transform: translateY(0);
            transition: all 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94); /* Kurva transisi yang lebih halus */
        }

        .timeline-item.left {
            left: 0;
            padding-right: 60px; /* Ruang lebih besar */
        }

        .timeline-item.right {
            left: 50%;
            padding-left: 60px; /* Ruang lebih besar */
        }

        .timeline-icon {
            width: 60px; /* Ukuran ikon lebih besar */
            height: 60px; /* Ukuran ikon lebih besar */
            line-height: 60px;
            font-size: 2.2rem; /* Ukuran ikon di dalam lingkaran */
            text-align: center;
            border-radius: 50%;
            position: absolute;
            top: 50%; /* Posisikan ikon di tengah vertikal item */
            transform: translateY(-50%);
            z-index: 1;
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.3); /* Bayangan ikon lebih menonjol */
        }

        .timeline-item.left .timeline-icon {
            right: -30px; /* Setengah dari lebar ikon */
        }

        .timeline-item.right .timeline-icon {
            left: -30px; /* Setengah dari lebar ikon */
        }

        .timeline-content {
            background-color: var(--white);
            border-radius: 12px; /* Sudut kartu lebih membulat */
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1); /* Bayangan kartu lebih kuat dan elegan */
            transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .timeline-content:hover {
            transform: translateY(-8px); /* Gerakan naik lebih tinggi */
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15); /* Bayangan lebih dramatis */
        }

        .timeline-content .card-body {
            padding: 30px; /* Padding kartu lebih besar */
        }

        .timeline-content .card-title {
            font-size: 1.45rem; /* Ukuran judul kartu lebih besar */
            margin-bottom: 10px;
        }

        .timeline-content .card-text {
            font-size: 1rem; /* Ukuran teks normal */
            line-height: 1.7; /* Spasi baris lebih nyaman */
            color: var(--dark-gray);
            margin-bottom: 0;
        }

        /* Call to Action Button */
        .custom-btn-blue {
            background: linear-gradient(to right, var(--accent-blue), #0066cc); /* Gradient pada tombol */
            border: none; /* Hilangkan border */
            padding: 16px 45px;
            font-size: 1.3rem; /* Ukuran font tombol lebih besar */
            border-radius: 50px;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            font-weight: 700;
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.35); /* Bayangan awal tombol */
        }

        .custom-btn-blue:hover {
            background: linear-gradient(to right, #0066cc, #0056b3); /* Gradient hover */
            transform: translateY(-5px); /* Gerakan naik lebih terasa */
            box-shadow: 0 10px 25px rgba(0, 123, 255, 0.5) !important; /* Bayangan lebih kuat saat hover */
        }
        .custom-btn-blue i {
            font-size: 1.4rem; /* Ukuran ikon di tombol */
            vertical-align: middle;
        }

        /* Responsive Adjustments */
        @media (max-width: 991.98px) {
            .timeline-container::after {
                left: 30px;
            }

            .timeline-item {
                width: 100%;
                padding-left: 80px;
                padding-right: 15px;
            }

            .timeline-item.right {
                left: 0;
            }

            .timeline-item.left .timeline-icon,
            .timeline-item.right .timeline-icon {
                left: 30px;
                margin-left: -30px;
                top: 20px;
                transform: translateY(0);
            }
            .timeline-content {
                margin-left: 0;
            }

            /* Responsive untuk sub-judul */
            .headline-subtitle {
                font-size: 1.35rem; /* Ukuran lebih kecil untuk tablet */
                letter-spacing: 0.02em;
            }
        }

        @media (max-width: 767.98px) {
            .display-4 {
                font-size: 2.8rem;
            }
            .lead {
                font-size: 1rem;
                margin-bottom: 3rem !important;
            }
            .timeline-content .card-body {
                padding: 20px;
            }
            .timeline-content .card-title {
                font-size: 1.25rem;
            }
            .timeline-content .card-text {
                font-size: 0.9rem;
            }
            .timeline-item {
                padding-left: 70px;
            }
            .timeline-item.left .timeline-icon,
            .timeline-item.right .timeline-icon {
                left: 25px;
                margin-left: -25px;
            }
            .timeline-icon {
                width: 50px;
                height: 50px;
                line-height: 50px;
                font-size: 1.8rem;
            }
            .custom-btn-blue {
                padding: 14px 35px;
                font-size: 1.15rem;
            }

            /* Responsive untuk sub-judul */
            .headline-subtitle {
                font-size: 1.15rem; /* Ukuran lebih kecil untuk ponsel */
                letter-spacing: 0.01em;
            }
        }

        @media (max-width: 575.98px) {
            .display-4 {
                font-size: 2.2rem;
                line-height: 1.2;
            }
            .pb-2 span {
                padding-bottom: 5px;
            }
            .lead {
                font-size: 0.95rem;
            }
            .timeline-item {
                padding-left: 60px;
            }
            .timeline-container::after {
                left: 20px;
            }
            .timeline-item.left .timeline-icon,
            .timeline-item.right .timeline-icon {
                left: 20px;
                margin-left: -25px;
            }

            /* Responsive untuk sub-judul */
            .headline-subtitle {
                font-size: 1rem; /* Ukuran terkecil untuk ponsel sangat kecil */
                line-height: 1.3;
                letter-spacing: 0em;
            }
        }
    </style>
@endsection