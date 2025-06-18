<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mitologi Clothing - Konveksi Indramayu Terbaik')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Variabel CSS Global: Pusat Kendali Estetika */
        :root {
            --color-primary: #1a2a40;
            /* Biru Dongker Pekat: Warna utama, kekuatan, dan profesionalisme */
            --color-secondary: #0d1a26;
            /* Hitam Kebiruan: Aksen gelap, kedalaman */
            --color-accent: #3498db;
            /* Biru Cerah: Bisa untuk highlight atau interaksi */
            --color-light: #ffffff;
            /* Putih Salju: Kebersihan, ruang, latar belakang utama */
            --color-gray-bg: #f8f8f8;
            /* Abu-abu Sangat Terang: Latar belakang subtle */
            --color-gray-text: #4a4a4a;
            /* Abu-abu Gelap untuk Teks: Keterbacaan optimal */
            --color-gray-subtle: #888;
            /* Abu-abu Sedang: Teks sekunder, deskripsi */
            --color-gray-active: #5a5a5a;
            /* Abu-abu sedikit lebih gelap untuk link non-aktif yang lebih menonjol */

            --shadow-sm: 0 2px 10px rgba(0, 0, 0, 0.05);
            /* Bayangan kecil, halus */
            --shadow-md: 0 8px 30px rgba(0, 0, 0, 0.08);
            /* Bayangan menengah, elegan */
            --shadow-lg: 0 15px 45px rgba(0, 0, 0, 0.12);
            /* Bayangan besar, dramatis */
            --shadow-hover: 0 20px 55px rgba(0, 0, 0, 0.18);
            /* Bayangan saat hover, efek melayang */

            --border-radius-sm: 10px;
            /* Sudut membulat kecil */
            --border-radius-md: 18px;
            /* Sudut membulat sedang */
            --transition-speed: 0.4s;
            /* Kecepatan transisi umum */
            --transition-ease: cubic-bezier(0.25, 0.8, 0.25, 1);
            /* Kurva transisi profesional */
        }

        /* Reset dan Gaya Body Umum */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-gray-bg);
            /* Latar belakang abu-abu sangat terang */
            color: var(--color-gray-text);
            /* Warna teks default */
            line-height: 1.65;
            /* Spasi baris optimal */
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .content {
            flex: 1;
            padding-top: 3.5rem;
            /* Ruang lebih lega di bawah navbar */
            padding-bottom: 3.5rem;
            /* Ruang lebih lega di atas footer */
        }

        /* Navbar: Fondasi Keanggunan Visual */
        .navbar-custom {
            background-color: var(--color-light) !important;
            box-shadow: var(--shadow-md);
            /* Bayangan elegan untuk navbar */
            padding: 1.2rem 0;
            /* Padding vertikal sedikit dikurangi agar lebih compact */
            border-bottom: 5px solid var(--color-primary);
            /* Garis bawah biru dongker pekat */
            transition: box-shadow var(--transition-speed) var(--transition-ease);
            position: sticky;
            /* Navbar sticky agar tetap terlihat saat scroll */
            top: 0;
            z-index: 1030;
            /* Pastikan navbar di atas elemen lain */
        }

        .navbar-custom:hover {
            box-shadow: var(--shadow-lg);
            /* Bayangan lebih kuat saat hover */
        }

        /* Navbar Brand: Identitas yang Kuat */
        .navbar-brand-custom {
            display: flex;
            align-items: center;
            font-weight: 800;
            /* Super tebal */
            color: var(--color-primary) !important;
            font-size: 1.6rem;
            transition: color var(--transition-speed) ease;
            text-decoration: none;
            letter-spacing: -0.03em;
            /* Sedikit kompresi huruf */
        }

        .navbar-brand-custom:hover {
            color: var(--color-secondary) !important;
        }

        .navbar-brand-custom img {
            height: 48px;
            /* Ukuran logo sedikit lebih kecil */
            margin-right: 15px;
            /* Margin sedikit dikurangi */
            border-radius: var(--border-radius-sm);
            transition: transform var(--transition-speed) var(--transition-ease);
        }

        .navbar-brand-custom:hover img {
            transform: scale(1.08) rotate(-2deg);
            /* Efek zoom dan rotasi halus */
        }

        /* Navigasi Link: Interaksi yang Halus, Lebih Sedang dan Rapat */
        .navbar-nav .nav-link {
            color: var(--color-gray-active) !important;
            font-weight: 600;
            /* Font semi-bold */
            margin-left: 1.2rem;
            /* Mengurangi margin-left untuk merapatkan jarak antar link */
            padding: 0.7rem 0.4rem;
            /* Padding vertikal dan horizontal */
            font-size: 0.95rem;
            transition: all var(--transition-speed) var(--transition-ease);
            position: relative;
            white-space: nowrap;
            /* Mencegah teks wrap ke baris baru di desktop */
        }

        /* Efek garis bawah saat hover & aktif */
        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            /* Awalnya lebar 0 */
            height: 3px;
            /* Garis sedikit lebih tipis */
            background-color: var(--color-accent);
            /* Warna garis aksen saat hover */
            bottom: 0;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            /* Awalnya tidak terlihat dan terkompresi */
            transition: width var(--transition-speed) var(--transition-ease),
                transform var(--transition-speed) var(--transition-ease),
                background-color var(--transition-speed) var(--transition-ease);
        }

        /* Tampil garis saat hover */
        .navbar-nav .nav-link:hover::after {
            width: 100%;
            transform: translateX(-50%) scaleX(1);
            /* Garis memanjang dan terlihat */
        }

        /* Link aktif */
        .navbar-nav .nav-link.active {
            color: var(--color-primary) !important;
            /* Warna teks aktif lebih gelap */
            transform: translateY(-2px);
            /* Efek melayang halus */
        }

        /* Garis bawah untuk link aktif */
        .navbar-nav .nav-link.active::after {
            width: 100%;
            transform: translateX(-50%) scaleX(1);
            background-color: var(--color-primary);
            /* Warna garis aktif sesuai primary color */
        }


        .navbar-nav .nav-link:hover {
            color: var(--color-primary) !important;
            transform: translateY(-2px);
            /* Efek melayang halus sedikit dikurangi */
        }

        /* Navbar Toggler: Responsifitas yang Bersih */
        .navbar-toggler {
            border: none;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius-sm);
            background-color: rgba(0, 0, 0, 0.03);
            /* Latar belakang subtle */
            transition: background-color 0.2s ease;
        }

        .navbar-toggler:hover {
            background-color: rgba(0, 0, 0, 0.06);
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(26, 42, 64, 0.2);
            /* Fokus ring biru dongker */
            outline: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%231a2a40' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }

        /* Footer: Penutup yang Solid dan Estetis */
        footer {
            background: linear-gradient(to right, var(--color-secondary), var(--color-primary));
            /* Gradasi warna dari gelap ke biru dongker */
            padding: 40px 0;
            /* Padding lebih besar */
            text-align: center;
            border-top: 8px solid var(--color-accent);
            /* Garis atas aksen biru cerah */
            color: var(--color-light);
            font-size: 0.9rem;
            box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.25);
            /* Bayangan lebih dramatis dari bawah */
            position: relative;
            /* Untuk pseudo-element */
            overflow: hidden;
            /* Pastikan gradasi tidak keluar */
        }

        footer p {
            margin-bottom: 0;
            font-weight: 400;
            opacity: 0.9;
        }

        /* Sentuhan Aksen di Footer (Efek visual) */
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at top left, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            /* Aksen gradasi radial */
            pointer-events: none;
            z-index: 0;
        }

        /* Responsivitas: Tampilan Sempurna di Setiap Perangkat */
        @media (max-width: 991.98px) {
            .navbar-brand-custom {
                font-size: 1.4rem;
            }

            .navbar-brand-custom img {
                height: 42px;
                margin-right: 10px;
            }

            .navbar-nav {
                margin-top: 1.2rem;
                /* Sedikit lebih rapat */
                padding: 0.8rem;
                /* Padding sedikit dikurangi */
            }

            .navbar-nav .nav-item {
                margin-bottom: 0.6rem;
                /* Sedikit lebih rapat */
                height: auto;
            }

            .navbar-nav .nav-link {
                margin-left: 0;
                padding-bottom: 0.4rem;
                /* Padding bawah sedikit dikurangi */
                font-size: 0.9rem;
                white-space: normal;
            }

            /* Pada mobile, garis aktif/hover bisa tetap terlihat untuk kejelasan */
            .navbar-nav .nav-link::after {
                width: 70%;
                transform: translateX(-50%) scaleX(1);
            }

            .navbar-nav .nav-link:hover {
                transform: none;
            }
        }

        @media (max-width: 768px) {
            .navbar-custom {
                padding: 0.8rem 0;
                /* Padding vertikal sedikit dikurangi lagi */
            }

            .navbar-brand-custom {
                font-size: 1.2rem;
            }

            .navbar-brand-custom img {
                height: 35px;
            }

            footer {
                padding: 20px 0;
                /* Padding footer sedikit dikurangi */
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
                <ul class="navbar-nav ms-auto">
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
                            {{-- Tampilkan nama user, bisa diubah sesuai kebutuhan --}}
                            <a class="nav-link" href="#">Halo, {{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-decoration-none" style="padding-top: 0.5rem; padding-bottom: 0.5rem;">Logout</button>
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Mitologi Clothing. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>