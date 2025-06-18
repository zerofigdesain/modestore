@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
    {{-- Container terluar untuk background abu-abu halus dan pemusatan kartu --}}
    <div class="container-fluid outer-background-desktop py-5">
        <div class="row justify-content-center">
            <div class="col-12 custom-col-width"> {{-- Menggunakan lebar kustom untuk kontrol lebih baik --}}
                {{-- Kartu Utama Putih yang Menyeluruh --}}
                <div class="main-profile-card-desktop shadow-lg border-0 rounded-4 animate__animated animate__fadeInUp">

                    {{-- Header Kartu (sebelumnya Hero Section) --}}
                    <div class="profile-header-card-desktop d-flex align-items-center justify-content-center text-white py-5 rounded-top-4">
                        <div class="text-center">
                            <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">PROFIL PENGGUNA</h1>
                            <p class="lead mb-0 animate__animated animate__fadeInUp animate__delay-0-5s">Informasi Akun Anda yang Berharga.</p>
                        </div>
                    </div>

                    {{-- Body Kartu --}}
                    <div class="card-body p-5">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-4 rounded-3" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Item Informasi pada Background Putih --}}
                        <div class="profile-info-item-white-bg-desktop mb-4 pb-3 border-bottom">
                            <label class="d-block text-dark-accent mb-1 small-label-white-bg-desktop"><i class="bi bi-person me-2"></i>NAMA LENGKAP</label>
                            <p class="mb-0 profile-value-white-bg-desktop fw-semibold">{{ $user->name }}</p>
                        </div>

                        <div class="profile-info-item-white-bg-desktop mb-4 pb-3 border-bottom">
                            <label class="d-block text-dark-accent mb-1 small-label-white-bg-desktop"><i class="bi bi-envelope me-2"></i>ALAMAT EMAIL</label>
                            <p class="mb-0 profile-value-white-bg-desktop fw-semibold">{{ $user->email }}</p>
                        </div>

                        <div class="profile-info-item-white-bg-desktop mb-4 pb-3 border-bottom">
                            <label class="d-block text-dark-accent mb-1 small-label-white-bg-desktop"><i class="bi bi-calendar-check me-2"></i>BERGABUNG SEJAK</label>
                            <p class="mb-0 profile-value-white-bg-desktop fw-semibold">{{ $user->created_at->format('d F Y') }}</p>
                        </div>

                        {{-- Anda bisa menambahkan informasi lain di sini --}}
                        {{-- <div class="profile-info-item-white-bg-desktop mb-4 pb-3 border-bottom">
                            <label class="d-block text-dark-accent mb-1 small-label-white-bg-desktop"><i class="bi bi-phone me-2"></i>NOMOR TELEPON</label>
                            <p class="mb-0 profile-value-white-bg-desktop fw-semibold">{{ $user->phone_number ?? '-' }}</p>
                        </div> --}}

                        <div class="d-flex justify-content-between align-items-center mt-5">
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary custom-btn-white-bg-desktop px-4 py-2">
                                <i class="bi bi-arrow-left me-2"></i> KEMBALI KE BERANDA
                            </a>
                            <button type="button" class="btn btn-primary custom-btn-primary-white-bg-desktop px-4 py-2">
                                <i class="bi bi-gear-fill me-2"></i> PENGATURAN LAIN
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Palet Warna Elegan dengan Dominan Putih */
        :root {
            --light-bg-outer: #F5F7FA;       /* Abu-abu sangat terang untuk latar belakang paling luar */
            --pure-white: #FFFFFF;           /* Putih bersih untuk kartu utama */
            --primary-navy: #003366;         /* Biru Dongker utama yang kaya */
            --secondary-navy: #004080;       /* Biru Dongker sekunder untuk gradient */
            --dark-text: #2C3E50;            /* Teks gelap, biru keabuan */
            --muted-text: #7F8C8D;           /* Teks abu-abu untuk label */
            --accent-gold: #D4AF37;          /* Emas klasik sebagai aksen */
            --accent-gold-dark: #A67C00;     /* Emas lebih gelap untuk hover */
            --border-light: #E0E6ED;         /* Border sangat halus */
            --shadow-subtle: rgba(0, 0, 0, 0.08); /* Bayangan ringan untuk efek mengambang */
            --shadow-deeper: rgba(0, 0, 0, 0.15); /* Bayangan lebih dalam saat hover */
            --shadow-card-float: rgba(0, 0, 0, 0.1); /* Bayangan kartu yang lebih jelas */
            --shadow-card-float-hover: rgba(0, 0, 0, 0.2); /* Bayangan kartu saat hover */
            --success-green: #28a745;        /* Hijau untuk alert success */
            --dark-accent: #34495E;          /* Biru dongker/abu-abu gelap untuk ikon/label utama */
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-bg-outer);
            color: var(--dark-text);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Latar Belakang Luar dan Pemusatan untuk Desktop */
        .outer-background-desktop {
            background-color: var(--light-bg-outer);
            min-height: 100vh; /* Pastikan menutupi seluruh tinggi viewport */
            display: flex;
            align-items: center; /* Pusatkan kartu secara vertikal */
            justify-content: center; /* Pusatkan kartu secara horizontal */
            padding: 50px 20px; /* Padding untuk desktop */
            overflow: auto; /* Agar bisa scroll jika konten lebih panjang */
        }

        /* Penyesuaian Lebar Kolom Kustom */
        .custom-col-width {
            max-width: 900px; /* Lebar maksimum kartu yang ideal untuk desktop */
            width: 100%; /* Pastikan mengisi 100% dari parent jika lebih kecil dari max-width */
        }

        /* Kartu Utama Putih (mode desktop) */
        .main-profile-card-desktop {
            background-color: var(--pure-white); /* Putih bersih */
            border-radius: 1.5rem; /* Sudut membulat */
            box-shadow: 0 20px 60px var(--shadow-card-float); /* Bayangan yang lebih jelas dan dalam */
            transition: transform 0.4s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.4s ease-out;
            position: relative;
            z-index: 10;
        }
        .main-profile-card-desktop:hover {
            transform: translateY(-8px); /* Naik sedikit lebih jauh saat hover */
            box-shadow: 0 30px 80px var(--shadow-card-float-hover); /* Bayangan lebih dalam saat hover */
        }

        /* Header Kartu (desktop) */
        .profile-header-card-desktop {
            background: linear-gradient(135deg, var(--primary-navy) 0%, var(--secondary-navy) 100%);
            border-top-left-radius: 1.5rem;
            border-top-right-radius: 1.5rem;
            padding: 4rem 3rem !important; /* Padding yang lebih luas untuk desktop */
            box-shadow: inset 0 -3px 8px rgba(0, 0, 0, 0.2);
        }
        .profile-header-card-desktop h1 {
            letter-spacing: 0.05em; /* Spasi huruf sedikit lebih lebar */
            font-size: 3.5rem; /* Ukuran font judul yang lebih besar */
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }
        .profile-header-card-desktop p {
            font-size: 1.2rem; /* Ukuran font sub-judul yang lebih besar */
        }

        .card-body {
            padding: 4rem !important; /* Padding body kartu yang sangat luas untuk desktop */
            position: relative;
        }

        /* Item Informasi pada Background Putih (desktop) */
        .profile-info-item-white-bg-desktop {
            border-color: var(--border-light) !important;
            margin-bottom: 2.5rem; /* Jarak antar item lebih besar */
            padding-bottom: 1.5rem;
            position: relative;
            transition: all 0.3s ease-out;
            cursor: pointer;
        }
        .profile-info-item-white-bg-desktop:hover {
            background-color: rgba(0, 51, 102, 0.04); /* Sentuhan biru dongker transparan yang sedikit lebih jelas saat hover */
            border-radius: 0.6rem;
            padding-left: 1.2rem; /* Indent sedikit lebih dalam saat hover */
        }

        .small-label-white-bg-desktop {
            font-size: 0.95rem; /* Ukuran font label yang pas */
            color: var(--muted-text) !important;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em; /* Spasi huruf lebih lebar */
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        .small-label-white-bg-desktop .bi {
            font-size: 1.1rem;
            color: var(--dark-accent);
        }

        .profile-value-white-bg-desktop {
            font-size: 1.35rem; /* Ukuran font nilai yang lebih besar */
            color: var(--dark-text) !important;
            word-wrap: break-word;
            font-weight: 700;
        }

        /* Alert Styling */
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: var(--success-green);
            font-weight: 500;
            padding: 1rem 1.5rem;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
        }
        .alert-success .bi {
            font-size: 1.3rem;
            color: var(--success-green);
        }
        .alert-dismissible .btn-close {
            color: var(--success-green);
            opacity: 0.8;
        }

        /* Buttons Elegan pada Background Putih (desktop) */
        .custom-btn-white-bg-desktop {
            border-radius: 50px;
            padding: 0.8rem 2.5rem; /* Padding tombol yang lebih besar */
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            transition: all 0.3s cubic-bezier(0.2, 0.8, 0.2, 1);
            box-shadow: 0 4px 10px var(--shadow-subtle);
            border: 1px solid;
        }
        .custom-btn-white-bg-desktop:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px var(--shadow-deeper);
        }

        /* Tombol Kembali ke Beranda (Outline) */
        .custom-btn-white-bg-desktop.btn-outline-secondary {
            border-color: var(--border-light);
            color: var(--muted-text);
            background-color: transparent;
        }
        .custom-btn-white-bg-desktop.btn-outline-secondary:hover {
            background-color: var(--light-bg-outer);
            color: var(--dark-text);
        }

        /* Tombol Utama (Aksen Biru Dongker dengan Emas) */
        .custom-btn-primary-white-bg-desktop {
            background: linear-gradient(45deg, var(--primary-navy) 0%, var(--secondary-navy) 100%);
            border-color: var(--primary-navy);
            color: var(--pure-white);
            position: relative;
            overflow: hidden;
        }
        .custom-btn-primary-white-bg-desktop::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: all 0.6s ease-in-out;
            transform: skewX(-20deg);
        }
        .custom-btn-primary-white-bg-desktop:hover::before {
            left: 100%;
        }
        .custom-btn-primary-white-bg-desktop .bi {
            color: var(--accent-gold);
            transition: transform 0.3s ease;
        }
        .custom-btn-primary-white-bg-desktop:hover .bi {
            transform: rotate(15deg) scale(1.1);
        }

        /* Responsive Adjustments */
        /* Pastikan elemen tetap responsif dan mengecil dengan anggun di layar yang lebih kecil */

        @media (max-width: 1200px) { /* Layar laptop/desktop kecil */
            .custom-col-width {
                max-width: 800px;
            }
            .profile-header-card-desktop {
                padding: 3.5rem 2.5rem !important;
            }
            .profile-header-card-desktop h1 {
                font-size: 3rem;
            }
            .profile-header-card-desktop p {
                font-size: 1.1rem;
            }
            .card-body {
                padding: 3.5rem !important;
            }
            .profile-value-white-bg-desktop {
                font-size: 1.25rem;
            }
            .small-label-white-bg-desktop {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 991px) { /* Tablet landscape, desktop kecil */
            .outer-background-desktop {
                align-items: flex-start; /* Tidak perlu pusatkan vertikal penuh di tablet/mobile */
                padding: 30px 15px; /* Kurangi padding di sisi */
            }
            .custom-col-width {
                max-width: 700px; /* Sesuaikan lebar agar pas */
            }
            .main-profile-card-desktop {
                border-radius: 1.25rem;
                box-shadow: 0 15px 45px var(--shadow-subtle);
            }
            .main-profile-card-desktop:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 50px var(--shadow-deeper);
            }
            .profile-header-card-desktop {
                padding: 3rem 2rem !important;
                border-top-left-radius: 1.25rem;
                border-top-right-radius: 1.25rem;
            }
            .profile-header-card-desktop h1 {
                font-size: 2.8rem;
                letter-spacing: 0.03em;
            }
            .profile-header-card-desktop p {
                font-size: 1.05rem;
            }
            .card-body {
                padding: 3rem !important;
            }
            .profile-info-item-white-bg-desktop {
                margin-bottom: 2rem;
                padding-bottom: 1.2rem;
            }
            .profile-value-white-bg-desktop {
                font-size: 1.15rem;
            }
            .small-label-white-bg-desktop {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 767px) { /* Tablet portrait, mobile besar */
            .outer-background-desktop {
                padding: 20px 10px;
            }
            .main-profile-card-desktop {
                border-radius: 1rem;
                box-shadow: 0 10px 30px var(--shadow-subtle);
            }
            .main-profile-card-desktop:hover {
                transform: translateY(-3px);
                box-shadow: 0 15px 40px var(--shadow-deeper);
            }
            .profile-header-card-desktop {
                padding: 2.5rem 1.5rem !important;
                border-top-left-radius: 1rem;
                border-top-right-radius: 1rem;
            }
            .profile-header-card-desktop h1 {
                font-size: 2.2rem;
                letter-spacing: 0.02em;
            }
            .profile-header-card-desktop p {
                font-size: 0.95rem;
            }
            .card-body {
                padding: 2.5rem !important;
            }
            .profile-info-item-white-bg-desktop {
                margin-bottom: 1.5rem;
                padding-bottom: 1rem;
            }
            .profile-value-white-bg-desktop {
                font-size: 1.05rem;
            }
            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 15px;
            }
            .custom-btn-white-bg-desktop {
                width: 100%;
                text-align: center;
                padding: 0.7rem 1.8rem;
            }
        }

        @media (max-width: 575px) { /* Mobile kecil */
            .profile-header-card-desktop h1 {
                font-size: 1.8rem;
            }
            .profile-header-card-desktop p {
                font-size: 0.85rem;
            }
            .card-body {
                padding: 1.8rem !important;
            }
            .profile-value-white-bg-desktop {
                font-size: 0.95rem;
            }
            .small-label-white-bg-desktop {
                font-size: 0.8rem;
            }
        }
    </style>
@endsection