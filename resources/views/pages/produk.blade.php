@extends('layouts.app')

@section('title', 'Produk - Mitologi Clothing')

@section('content')
    {{-- Container utama untuk halaman produk --}}
    <div class="container py-5 product-page-container-ciamik">
        <h2 class="mb-4 text-center section-title-ciamik animate__animated animate__fadeInDown">PRODUK KAMI</h2>
        <p class="text-center section-description-ciamik animate__animated animate__fadeInUp animate__delay-0-5s">Jelajahi koleksi konveksi premium Mitologi Clothing, didesain untuk keunggulan dan gaya.</p>

        <div class="row mt-5 justify-content-center">
            {{-- Loop melalui setiap produk yang didapat dari database --}}
            @forelse ($products as $product)
                <div class="col-sm-6 col-md-6 col-lg-4 mb-4 animate__animated animate__fadeInUp animate__delay-{{ $loop->iteration * 0.08 }}s"> {{-- Delay animasi sedikit lebih cepat --}}
                    <div class="card produk-card-ciamik h-100 rounded-4">
                        <div class="produk-image-wrapper-ciamik">
                            @if ($product->image)
                                {{-- Gambar dari storage --}}
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top produk-image-ciamik" alt="{{ $product->name }}">
                            @else
                                {{-- Gambar placeholder jika tidak ada gambar --}}
                                <img src="images\rompi.png" class="card-img-top produk-image-ciamik" alt="No Image">
                            @endif
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title produk-title-ciamik mb-2">{{ $product->name }}</h5>
                            <p class="card-text produk-description-ciamik mb-3">{{ Str::limit($product->description, 90) }}</p>
                            <div class="produk-price-wrapper-ciamik mb-3">
                                <p class="mb-0">Harga: <span class="price-value-ciamik fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span></p>
                            </div>

                            <div class="mt-auto pt-2">
                                {{-- Tombol menuju halaman detail produk --}}
                                <a href="{{ route('produk.detail', ['id' => $product->id]) }}" class="btn btn-navy-produk-ciamik btn-block">
                                    <i class="bi bi-arrow-right-circle-fill me-2"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Jika tidak ada produk --}}
                <div class="col-12">
                    <div class="alert alert-info-ciamik text-center py-4" role="alert">
                        <i class="bi bi-box-seam-fill me-2"></i> Maaf, belum ada produk dari Mitologi Clothing yang tersedia saat ini. Silakan cek kembali nanti!
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Jika menggunakan pagination (tetap opsional) --}}
        {{--
        <div class="d-flex justify-content-center mt-5">
            {{ $products->links() }}
        </div>
        --}}
    </div>

    <style>
        /* Palet Warna Final yang Lebih Berkesan (Tanpa Biru Muda) */
        :root {
            --bg-page-ciamik: #F0F0F0; /* Abu-abu sangat terang yang solid */
            --bg-body-gradient: linear-gradient(to bottom right, #E0E0E0, #F8F8F8); /* Gradien abu-abu yang lebih halus dan monokromatik */
            --card-bg-ciamik: #FFFFFF; /* Latar belakang kartu putih bersih */

            --primary-navy-head: #101820; /* Biru Dongker sangat pekat, hampir hitam */
            --primary-navy-btn: #1E2A3A; /* Biru Dongker gelap yang solid */
            --secondary-navy-btn: #283B5B; /* Biru Dongker yang sedikit lebih terang namun tetap dalam */

            --text-dark-ciamik: #333333; /* Teks utama, abu-abu gelap untuk kejelasan maksimal */
            --text-muted-ciamik: #666666; /* Teks abu-abu sedang yang elegan untuk deskripsi */
            --price-color-ciamik: #2980B9; /* Biru elegan yang tetap menjadi fokus harga */

            --accent-gold-ciamik: #FFD700; /* Emas murni untuk kilauan mewah */
            --accent-gold-dark-ciamik: #B8860B; /* Emas gelap yang lebih "mature" */

            --border-ciamik: #D3D3D3; /* Border abu-abu terang yang sedikit lebih gelap */
            --shadow-light-ciamik: rgba(0, 0, 0, 0.04); /* Bayangan sangat ringan */
            --shadow-medium-ciamik: rgba(0, 0, 0, 0.09); /* Bayangan sedang */
            --shadow-deep-ciamik: rgba(0, 0, 0, 0.18); /* Bayangan dalam */

            --alert-info-bg-ciamik: #F5F5F5; /* Background alert info (abu-abu sangat terang) */
            --alert-info-text-ciamik: #555555; /* Teks alert info (abu-abu sedang yang elegan) */
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-body-gradient);
            color: var(--text-dark-ciamik);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            margin: 0;
            padding: 0;
        }

        /* Container halaman produk */
        .product-page-container-ciamik {
            max-width: 1300px;
            margin-top: 4rem;
            margin-bottom: 4rem;
            box-shadow: 0 20px 60px var(--shadow-light-ciamik), 0 0 0 1px var(--border-ciamik);
            border-radius: 2rem;
            background-color: var(--card-bg-ciamik);
            padding: 5rem !important;
            position: relative;
            overflow: hidden;
            border: none;
        }
        .product-page-container-ciamik::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: inherit;
            background: transparent;
            box-shadow: inset 0 0 60px rgba(0,0,0,0.03); /* Inner glow sangat halus, sedikit lebih gelap */
            z-index: 0;
            pointer-events: none;
        }

        /* Judul dan Deskripsi Halaman Lebih Berkesan */
        .section-title-ciamik {
            font-size: 4.2rem;
            font-weight: 900;
            color: var(--primary-navy-head);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3); /* Bayangan teks lebih pekat */
            margin-bottom: 1.5rem !important;
            position: relative;
        }
        .section-title-ciamik::after {
            content: '';
            display: block;
            width: 90px;
            height: 6px;
            background: linear-gradient(90deg, var(--accent-gold-ciamik), var(--primary-navy-btn)); /* Gradien ke biru dongker */
            margin: 20px auto 0 auto;
            border-radius: 4px;
            opacity: 0.98; /* Hampir solid */
            box-shadow: 0 2px 8px rgba(255, 215, 0, 0.5); /* Bayangan emas yang lebih kuat */
        }
        .section-description-ciamik {
            font-size: 1.35rem;
            color: var(--text-muted-ciamik);
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 5rem !important;
            line-height: 1.6;
            font-weight: 400;
        }

        /* Kartu Produk yang Lebih Berkesan */
        .produk-card-ciamik {
            background-color: var(--card-bg-ciamik);
            border: 1px solid var(--border-ciamik);
            border-radius: 1.2rem;
            box-shadow:
                0 6px 25px var(--shadow-light-ciamik),
                0 18px 50px var(--shadow-medium-ciamik),
                0 0 0 1px var(--border-ciamik);
            transition: transform 0.5s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.5s ease-out;
            overflow: hidden;
            position: relative;
            z-index: 1;
            transform-origin: center bottom;
        }
        .produk-card-ciamik:hover {
            transform: translateY(-20px) scale(1.03);
            box-shadow:
                0 12px 40px var(--shadow-medium-ciamik),
                0 35px 90px var(--shadow-deep-ciamik),
                0 0 0 1px var(--price-color-ciamik);
        }
        /* Efek glow internal saat hover (tetap mempertahankan warna harga) */
        .produk-card-ciamik::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: inherit;
            box-shadow: inset 0 0 0px 0px rgba(41, 128, 185, 0.05);
            transition: box-shadow 0.5s ease-out;
            pointer-events: none;
            z-index: 0;
        }
        .produk-card-ciamik:hover::before {
            box-shadow: inset 0 0 30px 10px rgba(41, 128, 185, 0.15); /* Glow biru elegan yang lebih intens */
        }


        /* Wrapper Gambar Produk untuk Efek Overlap */
        .produk-image-wrapper-ciamik {
            height: 280px;
            overflow: hidden;
            border-top-left-radius: 1.2rem;
            border-top-right-radius: 1.2rem;
            position: relative;
            background-color: #F8F8F8;
        }
        .produk-image-wrapper-ciamik::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50px;
            background: linear-gradient(to top, rgba(255,255,255,1) 30%, rgba(255,255,255,0)); /* Gradien lebih cepat memudar */
            z-index: 2;
        }

        /* Gambar Produk */
        .produk-image-ciamik {
            height: 100%;
            object-fit: cover;
            width: 100%;
            transition: transform 0.7s cubic-bezier(0.25, 0.8, 0.25, 1), filter 0.5s ease-out;
            filter: brightness(1) saturate(1);
        }
        .produk-card-ciamik:hover .produk-image-ciamik {
            transform: scale(1.2);
            filter: brightness(0.9) saturate(1.2) contrast(1.05);
        }

        /* Judul Produk */
        .produk-title-ciamik {
            font-size: 1.8rem;
            font-weight: 850;
            color: var(--primary-navy-head);
            line-height: 1.3;
            margin-bottom: 0.8rem !important;
            transition: color 0.4s ease;
        }
        .produk-card-ciamik:hover .produk-title-ciamik {
            color: var(--price-color-ciamik);
        }

        /* Deskripsi Produk */
        .produk-description-ciamik {
            font-size: 1rem;
            color: var(--text-muted-ciamik);
            flex-grow: 1;
            line-height: 1.5;
        }

        /* Wrapper Harga Produk dengan Efek Neumorphism/Emboss */
        .produk-price-wrapper-ciamik {
            background-color: var(--bg-page-ciamik);
            border-radius: 0.7rem;
            padding: 0.9rem 1.2rem;
            margin-bottom: 1.8rem !important;
            display: inline-block;
            box-shadow:
                inset 2px 2px 5px rgba(0,0,0,0.06), /* Cahaya atas-kiri lebih terasa */
                inset -2px -2px 5px rgba(255,255,255,0.8); /* Bayangan bawah-kanan lebih kuat */
            transition: all 0.3s ease;
        }
        .produk-card-ciamik:hover .produk-price-wrapper-ciamik {
            box-shadow:
                inset 3px 3px 8px rgba(0,0,0,0.1),
                inset -3px -3px 8px rgba(255,255,255,1); /* Efek emboss lebih dalam saat hover */
        }
        .produk-price-wrapper-ciamik p {
            margin-bottom: 0;
            font-size: 1.05rem;
            color: var(--text-dark-ciamik);
        }
        .price-value-ciamik {
            font-size: 1.35rem;
            color: var(--price-color-ciamik);
            letter-spacing: 0.03em;
            font-weight: 800;
        }


        /* Tombol Produk yang Paling Berkesan */
        .btn-navy-produk-ciamik {
            background: linear-gradient(45deg, var(--primary-navy-btn) 0%, var(--secondary-navy-btn) 100%);
            border: none;
            color: var(--card-bg-ciamik);
            padding: 0.9rem 2.2rem;
            border-radius: 60px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            box-shadow: 0 10px 30px rgba(30, 42, 58, 0.5); /* Bayangan tombol lebih pekat */
            transition: all 0.6s cubic-bezier(0.2, 0.8, 0.2, 1);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .btn-navy-produk-ciamik:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 50px rgba(30, 42, 58, 0.7); /* Bayangan lebih dramatis dan menyebar */
            background: linear-gradient(45deg, var(--secondary-navy-btn) 0%, var(--primary-navy-btn) 100%);
        }
        /* Efek Shimmer Emas pada Tombol (lebih dinamis) */
        .btn-navy-produk-ciamik::before {
            content: '';
            position: absolute;
            top: 0;
            left: -180%;
            width: 70%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.7), transparent); /* Kilau putih lebih intens */
            transform: skewX(-25deg);
            transition: all 0.9s cubic-bezier(0.2, 0.8, 0.2, 1);
            z-index: -1;
        }
        .btn-navy-produk-ciamik:hover::before {
            left: 180%;
        }

        .btn-navy-produk-ciamik .bi {
            color: var(--accent-gold-ciamik);
            transition: transform 0.5s ease, color 0.5s ease;
        }
        .btn-navy-produk-ciamik:hover .bi {
            transform: translateX(7px) scale(1.2);
            color: var(--accent-gold-dark-ciamik);
        }
        .btn-navy-produk-ciamik:active {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(30, 42, 58, 0.4);
        }

        /* Alert Jika Tidak Ada Produk Lebih Berkesan (Tanpa Biru Muda) */
        .alert-info-ciamik {
            background-color: var(--alert-info-bg-ciamik);
            border: 2px solid var(--alert-info-text-ciamik);
            color: var(--alert-info-text-ciamik);
            font-weight: 700;
            border-radius: 1.2rem;
            font-size: 1.25rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); /* Bayangan lebih jelas */
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1.6;
            padding: 2rem !important;
        }
        .alert-info-ciamik .bi {
            font-size: 2.2rem;
            vertical-align: middle;
            margin-right: 1.2rem;
            color: var(--alert-info-text-ciamik);
        }

        /* Responsif untuk Kesempurnaan Berkesan */
        @media (max-width: 1200px) {
            .product-page-container-ciamik {
                max-width: 1000px;
                padding: 4rem !important;
                border-radius: 1.8rem;
            }
            .section-title-ciamik {
                font-size: 3.8rem;
            }
            .section-description-ciamik {
                font-size: 1.2rem;
            }
            .produk-image-wrapper-ciamik {
                height: 250px;
            }
            .produk-title-ciamik {
                font-size: 1.6rem;
            }
            .produk-description-ciamik {
                font-size: 0.95rem;
            }
            .price-value-ciamik {
                font-size: 1.25rem;
            }
            .btn-navy-produk-ciamik {
                padding: 0.8rem 2rem;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 991px) {
            .product-page-container-ciamik {
                max-width: 760px;
                padding: 3rem !important;
                border-radius: 1.5rem;
                box-shadow: 0 15px 45px var(--shadow-light-ciamik), 0 0 0 1px var(--border-ciamik);
            }
            .section-title-ciamik {
                font-size: 3.2rem;
                letter-spacing: 0.06em;
            }
            .section-description-ciamik {
                font-size: 1.1rem;
            }
            .produk-card-ciamik {
                border-radius: 1rem;
                box-shadow: 0 8px 25px var(--shadow-light-ciamik), 0 15px 40px var(--shadow-medium-ciamik);
            }
            .produk-card-ciamik:hover {
                transform: translateY(-15px) scale(1.02);
                box-shadow: 0 18px 50px var(--shadow-medium-ciamik), 0 30px 75px var(--shadow-deep-ciamik);
            }
            .produk-image-wrapper-ciamik {
                height: 220px;
            }
            .produk-title-ciamik {
                font-size: 1.5rem;
            }
            .produk-description-ciamik {
                font-size: 0.9rem;
            }
            .price-value-ciamik {
                font-size: 1.15rem;
            }
            .btn-navy-produk-ciamik {
                padding: 0.75rem 1.8rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 767px) {
            .product-page-container-ciamik {
                padding: 2.5rem !important;
                margin-top: 2rem;
                margin-bottom: 2rem;
                border-radius: 1.2rem;
                box-shadow: none;
            }
            .product-page-container-ciamik::before {
                display: none;
            }
            .section-title-ciamik {
                font-size: 2.8rem;
                letter-spacing: 0.05em;
                text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.25);
            }
            .section-title-ciamik::after {
                width: 70px;
                margin-top: 12px;
                height: 5px;
            }
            .section-description-ciamik {
                font-size: 1rem;
                margin-bottom: 3.5rem !important;
            }
            .col-sm-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .produk-card-ciamik {
                margin-left: auto;
                margin-right: auto;
                max-width: 450px;
                border-radius: 1rem;
                box-shadow: 0 8px 25px var(--shadow-light-ciamik);
            }
            .produk-card-ciamik:hover {
                transform: translateY(-8px) scale(1.01);
                box-shadow: 0 12px 30px var(--shadow-medium-ciamik);
            }
            .produk-image-wrapper-ciamik {
                height: 200px;
            }
            .produk-title-ciamik {
                font-size: 1.4rem;
            }
            .produk-description-ciamik {
                font-size: 0.9rem;
            }
            .produk-price-wrapper-ciamik {
                padding: 0.7rem 1rem;
            }
            .price-value-ciamik {
                font-size: 1.15rem;
            }
            .btn-navy-produk-ciamik {
                font-size: 0.9rem;
                padding: 0.7rem 1.6rem;
            }
            .card-body {
                padding: 1.8rem !important;
            }
        }

        @media (max-width: 575px) {
            .section-title-ciamik {
                font-size: 2.2rem;
            }
            .section-title-ciamik::after {
                width: 60px;
                height: 4px;
            }
            .section-description-ciamik {
                font-size: 0.9rem;
                margin-bottom: 3rem !important;
            }
            .produk-image-wrapper-ciamik {
                height: 180px;
            }
            .produk-title-ciamik {
                font-size: 1.25rem;
            }
            .produk-description-ciamik {
                font-size: 0.85rem;
            }
            .price-value-ciamik {
                font-size: 1.05rem;
            }
            .btn-navy-produk-ciamik {
                font-size: 0.85rem;
                padding: 0.65rem 1.4rem;
            }
            .card-body {
                padding: 1.8rem !important;
            }
        }
    </style>
@endsection