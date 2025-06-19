<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mitologi Clothing - Konveksi Indramayu Terbaik')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Variabel CSS Global: Pusat Kendali Estetika yang Lebih Halus */
        :root {
            --color-primary: #1a2a40;
            /* Biru Dongker Pekat: Warna utama, kekuatan, dan profesionalisme */
            --color-secondary: #0d1a26;
            /* Hitam Kebiruan: Aksen gelap, kedalaman */
            --color-accent: #3498db;
            /* Biru Cerah: Bisa untuk highlight atau interaksi */
            --color-light: #ffffff;
            /* Putih Salju: Kebersihan, ruang, latar belakang utama */
            --color-gray-bg: #f8fafd;
            /* Abu-abu Sangat Terang Kebiruan: Latar belakang subtle yang lebih cerah */
            --color-gray-text: #333333;
            /* Abu-abu Gelap untuk Teks: Keterbacaan optimal, lebih kuat */
            --color-gray-subtle: #6c757d;
            /* Abu-abu Sedang: Teks sekunder, deskripsi, sedikit lebih kalem */
            --color-gray-active: #555555;
            /* Abu-abu sedikit lebih gelap untuk link non-aktif yang lebih menonjol */

            --shadow-sm: 0 3px 12px rgba(0, 0, 0, 0.06);
            /* Bayangan kecil, lebih halus */
            --shadow-md: 0 8px 25px rgba(0, 0, 0, 0.09);
            /* Bayangan menengah, elegan */
            --shadow-lg: 0 15px 40px rgba(0, 0, 0, 0.13);
            /* Bayangan besar, dramatis tapi tetap soft */
            --shadow-hover: 0 20px 50px rgba(0, 0, 0, 0.18);
            /* Bayangan saat hover, efek melayang yang pas */

            --border-radius-sm: 6px;
            /* Sudut membulat lebih kecil */
            --border-radius-md: 12px;
            /* Sudut membulat sedang */
            --transition-speed: 0.35s;
            /* Kecepatan transisi umum, sedikit lebih cepat */
            --transition-ease: cubic-bezier(0.2, 0.8, 0.2, 1);
            /* Kurva transisi profesional yang lebih smooth */
        }

        /* Reset dan Gaya Body Umum */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-gray-bg);
            color: var(--color-gray-text);
            line-height: 1.6;
            /* Spasi baris lebih rapat untuk kerapian */
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .content {
            flex: 1;
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        /* Navbar: Fondasi Keanggunan Visual */
        .navbar-custom {
            background-color: rgba(255, 255, 255, 0.98) !important;
            /* Lebih opaque, blur lebih subtle */
            backdrop-filter: blur(8px);
            /* Efek blur sedikit dikurangi */
            -webkit-backdrop-filter: blur(8px);
            box-shadow: var(--shadow-md);
            padding: 1rem 0;
            /* Padding vertikal lebih rapat */
            border-bottom: 4px solid var(--color-primary);
            /* Garis bawah sedikit lebih tipis */
            transition: all var(--transition-speed) var(--transition-ease);
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .navbar-custom:hover {
            box-shadow: var(--shadow-lg);
        }

        /* Navbar Brand: Identitas yang Kuat */
        .navbar-brand-custom {
            display: flex;
            align-items: center;
            font-weight: 700;
            /* Lebih tebal dari sedang, tidak super tebal */
            color: var(--color-primary) !important;
            font-size: 1.6rem;
            /* Ukuran font sedikit lebih kecil */
            transition: color var(--transition-speed) ease;
            text-decoration: none;
            letter-spacing: -0.02em;
            /* Kompresi huruf sedikit dikurangi */
        }

        .navbar-brand-custom:hover {
            color: var(--color-accent) !important;
        }

        .navbar-brand-custom img {
            height: 50px;
            /* Ukuran logo sedikit disesuaikan */
            margin-right: 12px;
            /* Margin sedikit dikurangi */
            border-radius: var(--border-radius-sm);
            transition: transform var(--transition-speed) var(--transition-ease);
        }

        .navbar-brand-custom:hover img {
            transform: scale(1.05) rotate(-2deg);
            /* Efek zoom dan rotasi lebih halus */
        }

        /* Navigasi Link: Interaksi yang Halus, Lebih Ramping */
        .navbar-nav .nav-link {
            color: var(--color-gray-subtle) !important;
            font-weight: 500;
            /* Font medium */
            margin-left: 1.4rem;
            /* Jarak antar link sedikit lebih rapat */
            padding: 0.6rem 0.5rem;
            /* Padding vertikal dan horizontal sedikit dikurangi */
            font-size: 0.92rem;
            /* Ukuran font lebih kecil */
            transition: all var(--transition-speed) var(--transition-ease);
            position: relative;
            white-space: nowrap;
        }

        /* Efek garis bawah saat hover & aktif */
        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            /* Garis lebih tipis */
            background-color: var(--color-accent);
            bottom: -5px;
            /* Posisi garis sedikit di bawah */
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            transition: all var(--transition-speed) var(--transition-ease);
        }

        /* Tampil garis saat hover */
        .navbar-nav .nav-link:hover::after {
            width: 80%;
            /* Garis lebih pendek saat hover */
            transform: translateX(-50%) scaleX(1);
        }

        /* Link aktif */
        .navbar-nav .nav-link.active {
            color: var(--color-primary) !important;
            transform: translateY(-2px);
            /* Efek melayang halus sedikit dikurangi */
        }

        /* Garis bawah untuk link aktif */
        .navbar-nav .nav-link.active::after {
            width: 100%;
            /* Garis penuh untuk yang aktif */
            transform: translateX(-50%) scaleX(1);
            background-color: var(--color-primary);
        }

        .navbar-nav .nav-link:hover {
            color: var(--color-primary) !important;
            transform: translateY(-2px);
        }

        /* Tombol Hubungi Kami */
        .btn-contact-us {
            background-color: var(--color-accent);
            color: var(--color-light);
            border-radius: var(--border-radius-md);
            padding: 0.7rem 1.6rem;
            /* Padding sedikit lebih kecil */
            font-weight: 600;
            /* Font semi-bold */
            margin-left: 1.8rem;
            /* Margin sedikit dikurangi */
            transition: all var(--transition-speed) var(--transition-ease);
            box-shadow: var(--shadow-sm);
            /* Bayangan lebih subtle */
            text-decoration: none;
            font-size: 0.9rem;
            /* Ukuran font tombol lebih kecil */
        }

        .btn-contact-us:hover {
            background-color: var(--color-primary);
            color: var(--color-light);
            transform: translateY(-2px) scale(1.01);
            /* Efek hover lebih halus */
            box-shadow: var(--shadow-md);
        }


        /* Navbar Toggler: Responsifitas yang Bersih */
        .navbar-toggler {
            border: none;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius-sm);
            background-color: rgba(0, 0, 0, 0.03);
            transition: background-color 0.2s ease;
        }

        .navbar-toggler:hover {
            background-color: rgba(0, 0, 0, 0.07);
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(26, 42, 64, 0.25);
            outline: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%231a2a40' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }

        /* Footer: Penutup yang Solid dan Estetis */
        footer {
            background: linear-gradient(to right, var(--color-secondary), var(--color-primary));
            padding: 50px 0 25px;
            /* Padding sedikit disesuaikan */
            text-align: center;
            border-top: 8px solid var(--color-accent);
            /* Garis atas aksen biru cerah sedikit lebih tipis */
            color: var(--color-light);
            font-size: 0.9rem;
            /* Ukuran font sedikit lebih kecil */
            box-shadow: 0 -12px 35px rgba(0, 0, 0, 0.28);
            /* Bayangan sedikit lebih halus */
            position: relative;
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at top left, rgba(255, 255, 255, 0.06) 0%, transparent 50%);
            /* Aksen gradasi radial sedikit lebih halus */
            pointer-events: none;
            z-index: 0;
        }

        footer .container {
            z-index: 1;
            position: relative;
        }

        footer h5 {
            color: var(--color-accent);
            font-weight: 600;
            /* Font semi-bold */
            margin-bottom: 20px;
            /* Margin sedikit dikurangi */
            font-size: 1.1rem;
            /* Ukuran font judul kolom lebih kecil */
            position: relative;
            padding-bottom: 8px;
            /* Padding sedikit dikurangi */
        }

        footer h5::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            /* Garis lebih pendek */
            height: 2px;
            /* Garis lebih tipis */
            background-color: var(--color-accent);
            border-radius: 5px;
        }

        footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        footer ul li {
            margin-bottom: 10px;
            /* Margin sedikit lebih rapat */
        }

        footer ul li a {
            color: rgba(255, 255, 255, 0.75);
            /* Warna link sedikit lebih transparan */
            text-decoration: none;
            transition: color var(--transition-speed) ease, transform 0.2s ease;
            display: inline-block;
            font-size: 0.88rem;
            /* Ukuran font link lebih kecil */
        }

        footer ul li a:hover {
            color: var(--color-light);
            transform: translateX(3px);
            /* Efek geser lebih halus */
        }

        footer .social-icons a {
            color: var(--color-light);
            font-size: 1.3rem;
            /* Ukuran ikon lebih kecil */
            margin: 0 12px;
            /* Margin sedikit dikurangi */
            transition: color 0.3s ease, transform 0.2s ease;
            text-decoration: none;
        }

        footer .social-icons a:hover {
            color: var(--color-accent);
            transform: translateY(-3px) scale(1.05);
            /* Efek hover lebih halus */
        }

        footer .footer-bottom-text {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            /* Garis lebih subtle */
            padding-top: 20px;
            /* Padding sedikit dikurangi */
            margin-top: 30px;
            /* Margin sedikit dikurangi */
            opacity: 0.7;
            /* Lebih transparan */
            font-size: 0.8rem;
            /* Ukuran font paling kecil */
        }

        /* Responsivitas: Tampilan Sempurna di Setiap Perangkat */
        @media (max-width: 991.98px) {
            .navbar-brand-custom {
                font-size: 1.5rem;
            }

            .navbar-brand-custom img {
                height: 45px;
                margin-right: 10px;
            }

            .navbar-nav {
                margin-top: 1.2rem;
                padding: 0.8rem;
                background-color: rgba(255, 255, 255, 0.98);
                border-radius: var(--border-radius-md);
                box-shadow: var(--shadow-md);
            }

            .navbar-nav .nav-item {
                margin-bottom: 0.5rem;
            }

            .navbar-nav .nav-link {
                padding-bottom: 0.4rem;
                font-size: 0.9rem;
            }

            .navbar-nav .nav-link::after {
                width: 50%;
                left: 50%;
                transform: translateX(-50%) scaleX(1);
            }

            .btn-contact-us {
                margin-top: 0.8rem;
                margin-left: 0;
                width: 100%;
                text-align: center;
                font-size: 0.85rem;
            }

            footer .col-md-4 {
                margin-bottom: 30px;
            }

            footer h5::after {
                left: 50%;
                transform: translateX(-50%);
            }

            footer ul {
                text-align: center;
            }

            footer ul li a {
                font-size: 0.85rem;
            }

            footer .social-icons {
                margin-top: 15px;
            }

            footer .social-icons a {
                font-size: 1.2rem;
                margin: 0 8px;
            }
        }

        @media (max-width: 768px) {
            .navbar-custom {
                padding: 0.8rem 0;
            }

            .navbar-brand-custom {
                font-size: 1.3rem;
            }

            .navbar-brand-custom img {
                height: 38px;
            }

            footer {
                padding: 30px 0 15px;
                font-size: 0.8rem;
            }

            footer h5 {
                font-size: 1rem;
            }

            footer .social-icons a {
                font-size: 1.1rem;
            }

            footer .footer-bottom-text {
                font-size: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
            <a class="navbar-brand navbar-brand-custom" href="{{ url('/') }}">
                <img src="{{ asset('images/logo-mitologi.png') }}" alt="Mitologi Clothing Logo">
                Mitologi Clothing
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                            href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('produk*') ? 'active' : '' }}"
                            href="{{ url('/produk') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('faq') ? 'active' : '' }}"
                            href="{{ url('/faq') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('cara-order') ? 'active' : '' }}"
                            href="{{ url('/cara-order') }}">Cara Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}"
                            href="{{ url('/contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('portofolio') ? 'active' : '' }}"
                            href="{{ url('/portofolio') }}">Portofolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about-us') ? 'active' : '' }}"
                            href="{{ url('/about-us') }}">About Us</a>
                    </li>

                    {{-- Bagian yang berubah setelah login: Tambahkan @auth dan @guest --}}
                    @auth {{-- Jika user sudah login --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">Halo, {{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-decoration-none"
                                style="padding-top: 0.5rem; padding-bottom: 0.5rem;">Logout</button>
                        </form>
                    </li>
                    @else {{-- Jika user belum login (masih guest) --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('login') ? 'active' : '' }}"
                            href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('register') ? 'active' : '' }}"
                            href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="btn btn-contact-us" href="{{ url('/contact') }}">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Mitologi Clothing</h5>
                    <p>Konveksi terpercaya di Indramayu untuk semua kebutuhan pakaian Anda. Kualitas terbaik, harga
                        bersaing, dan pelayanan prima.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/produk') }}">Produk Kami</a></li>
                        <li><a href="{{ url('/cara-order') }}">Cara Order</a></li>
                        <li><a href="{{ url('/portofolio') }}">Portofolio</a></li>
                        <li><a href="{{ url('/about-us') }}">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Ikuti Kami</h5>
                    <div class="social-icons">
                        <a href="#" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" target="_blank" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                    </div>
                    <p class="mt-4">Jl. Lama Blok Pasar Senggol, Desa Leuwigede, Kecamatan Widasari, Kabupaten Indramayu, Jawa Barat, Indonesia.</p>
                    <p>Email: mitologiclothing@gmail.com</p>
                    <p>Telepon: (0234) 1234567</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="footer-bottom-text">&copy; {{ date('Y') }} Mitologi Clothing. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Opsional: Efek shadow yang lebih kuat saat scroll di navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-custom');
            if (window.scrollY > 50) {
                navbar.style.boxShadow = 'var(--shadow-lg)';
            } else {
                navbar.style.boxShadow = 'var(--shadow-md)';
            }
        });
    </script>
    @yield('scripts')
</body>

</html>