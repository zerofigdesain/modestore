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
            --bg-page-ciamik: #F0F0F0;
            /* Abu-abu sangat terang yang solid */
            --bg-body-gradient: linear-gradient(to bottom right, #E0E0E0, #F8F8F8);
            /* Gradien abu-abu yang lebih halus dan monokromatik */
            --card-bg-ciamik: #FFFFFF;
            /* Latar belakang kartu putih bersih */

            --primary-navy-head: #101820;
            /* Biru Dongker sangat pekat, hampir hitam */
            --primary-navy-btn: #1E2A3A;
            /* Biru Dongker gelap yang solid */
            --secondary-navy-btn: #283B5B;
            /* Biru Dongker yang sedikit lebih terang namun tetap dalam */

            --text-dark-ciamik: #333333;
            /* Teks utama, abu-abu gelap untuk kejelasan maksimal */
            --text-muted-ciamik: #666666;
            /* Teks abu-abu sedang yang elegan untuk deskripsi */
            --price-color-ciamik: #2980B9;
            /* Biru elegan yang tetap menjadi fokus harga */

            --accent-gold-ciamik: #FFD700;
            /* Emas murni untuk kilauan mewah */
            --accent-gold-dark-ciamik: #B8860B;
            /* Emas gelap yang lebih "mature" */

            --border-ciamik: #D3D3D3;
            /* Border abu-abu terang yang sedikit lebih gelap */
            --shadow-light-ciamik: rgba(0, 0, 0, 0.04);
            /* Bayangan sangat ringan */
            --shadow-medium-ciamik: rgba(0, 0, 0, 0.09);
            /* Bayangan sedang */
            --shadow-deep-ciamik: rgba(0, 0, 0, 0.18);
            /* Bayangan dalam */

            --alert-info-bg-ciamik: #F5F5F5;
            /* Background alert info (abu-abu sangat terang) */
            --alert-info-text-ciamik: #555555;
            /* Teks alert info (abu-abu sedang yang elegan) */
        }

        body {
            font-family: 'Poppins', sans-serif; /* Menggunakan Poppins untuk konsistensi */
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
            max-width: 1200px; /* Lebar maksimum sedikit dikecilkan */
            margin-top: 4rem;
            margin-bottom: 4rem;
            box-shadow: 0 15px 50px var(--shadow-light-ciamik), 0 0 0 1px var(--border-ciamik); /* Bayangan lebih fokus, tidak terlalu menyebar */
            border-radius: 1.8rem; /* Border radius sedikit lebih kecil */
            background-color: var(--card-bg-ciamik);
            padding: 4rem !important; /* Padding disesuaikan */
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
            box-shadow: inset 0 0 45px rgba(0, 0, 0, 0.02); /* Inner glow lebih halus */
            z-index: 0;
            pointer-events: none;
        }

        /* Judul dan Deskripsi Halaman Lebih Berkesan */
        .section-title-ciamik {
            font-size: 3.5rem; /* Ukuran judul utama lebih moderat */
            font-weight: 800; /* Sedikit lebih ringan dari 900 */
            color: var(--primary-navy-head);
            letter-spacing: 0.06em; /* Spacing huruf sedikit dikurangi */
            text-transform: uppercase;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2); /* Bayangan teks lebih halus */
            margin-bottom: 1.2rem !important; /* Margin bawah sedikit dikurangi */
            position: relative;
        }

        .section-title-ciamik::after {
            content: '';
            display: block;
            width: 80px; /* Lebar garis sedikit dikurangi */
            height: 5px; /* Tinggi garis sedikit dikurangi */
            background: linear-gradient(90deg, var(--accent-gold-ciamik), var(--primary-navy-btn));
            margin: 15px auto 0 auto; /* Margin atas sedikit dikurangi */
            border-radius: 4px;
            opacity: 0.95; /* Sedikit lebih transparan */
            box-shadow: 0 1px 6px rgba(255, 215, 0, 0.4); /* Bayangan emas lebih halus */
        }

        .section-description-ciamik {
            font-size: 1.15rem; /* Ukuran deskripsi sedikit dikecilkan */
            color: var(--text-muted-ciamik);
            max-width: 800px; /* Lebar maksimal deskripsi dikurangi */
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 4rem !important; /* Margin bawah disesuaikan */
            line-height: 1.5; /* Line height sedikit dikurangi */
            font-weight: 400;
        }

        /* Kartu Produk yang Lebih Berkesan */
        .produk-card-ciamik {
            background-color: var(--card-bg-ciamik);
            border: 1px solid var(--border-ciamik);
            border-radius: 1rem; /* Sudut membulat lebih halus */
            box-shadow:
                0 4px 18px var(--shadow-light-ciamik),
                0 12px 35px var(--shadow-medium-ciamik),
                0 0 0 1px var(--border-ciamik);
            transition: transform 0.4s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.4s ease-out; /* Transisi lebih cepat */
            overflow: hidden;
            position: relative;
            z-index: 1;
            transform-origin: center bottom;
        }

        .produk-card-ciamik:hover {
            transform: translateY(-15px) scale(1.02); /* Efek melayang lebih subtle */
            box-shadow:
                0 8px 30px var(--shadow-medium-ciamik),
                0 25px 70px var(--shadow-deep-ciamik),
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
            box-shadow: inset 0 0 0px 0px rgba(41, 128, 185, 0.03); /* Glow sangat halus */
            transition: box-shadow 0.4s ease-out;
            pointer-events: none;
            z-index: 0;
        }

        .produk-card-ciamik:hover::before {
            box-shadow: inset 0 0 20px 8px rgba(41, 128, 185, 0.1); /* Glow biru elegan yang lebih intens */
        }


        /* Wrapper Gambar Produk untuk Efek Overlap */
        .produk-image-wrapper-ciamik {
            height: 260px; /* Tinggi gambar sedikit dikurangi */
            overflow: hidden;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            position: relative;
            background-color: #F8F8F8;
        }

        .produk-image-wrapper-ciamik::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 40px; /* Tinggi gradien disesuaikan */
            background: linear-gradient(to top, rgba(255, 255, 255, 1) 40%, rgba(255, 255, 255, 0));
            /* Gradien lebih cepat memudar */
            z-index: 2;
        }

        /* Gambar Produk */
        .produk-image-ciamik {
            height: 100%;
            object-fit: cover;
            width: 100%;
            transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.25, 1), filter 0.4s ease-out; /* Transisi lebih cepat */
            filter: brightness(1) saturate(1);
        }

        .produk-card-ciamik:hover .produk-image-ciamik {
            transform: scale(1.15); /* Zoom lebih subtle */
            filter: brightness(0.95) saturate(1.1) contrast(1.03); /* Filter lebih halus */
        }

        /* Judul Produk */
        .produk-title-ciamik {
            font-size: 1.6rem; /* Ukuran judul produk disesuaikan */
            font-weight: 800; /* Font weight disesuaikan */
            color: var(--primary-navy-head);
            line-height: 1.3;
            margin-bottom: 0.7rem !important; /* Margin bawah disesuaikan */
            transition: color 0.3s ease;
        }

        .produk-card-ciamik:hover .produk-title-ciamik {
            color: var(--price-color-ciamik);
        }

        /* Deskripsi Produk */
        .produk-description-ciamik {
            font-size: 0.95rem; /* Ukuran deskripsi sedikit dikecilkan */
            color: var(--text-muted-ciamik);
            flex-grow: 1;
            line-height: 1.5;
        }

        /* Wrapper Harga Produk dengan Efek Neumorphism/Emboss */
        .produk-price-wrapper-ciamik {
            background-color: var(--bg-page-ciamik);
            border-radius: 0.6rem; /* Radius lebih kecil */
            padding: 0.8rem 1.1rem; /* Padding disesuaikan */
            margin-bottom: 1.6rem !important; /* Margin bawah disesuaikan */
            display: inline-block;
            box-shadow:
                inset 1.5px 1.5px 4px rgba(0, 0, 0, 0.05),
                /* Cahaya atas-kiri lebih halus */
                inset -1.5px -1.5px 4px rgba(255, 255, 255, 0.7);
            /* Bayangan bawah-kanan lebih halus */
            transition: all 0.25s ease;
        }

        .produk-card-ciamik:hover .produk-price-wrapper-ciamik {
            box-shadow:
                inset 2px 2px 6px rgba(0, 0, 0, 0.08),
                inset -2px -2px 6px rgba(255, 255, 255, 0.9);
            /* Efek emboss lebih dalam saat hover */
        }

        .produk-price-wrapper-ciamik p {
            margin-bottom: 0;
            font-size: 0.95rem; /* Ukuran font di dalam wrapper harga */
            color: var(--text-dark-ciamik);
        }

        .price-value-ciamik {
            font-size: 1.25rem; /* Ukuran nilai harga disesuaikan */
            color: var(--price-color-ciamik);
            letter-spacing: 0.02em; /* Spacing huruf sedikit dikurangi */
            font-weight: 700; /* Font weight disesuaikan */
        }


        /* Tombol Produk yang Paling Berkesan */
        .btn-navy-produk-ciamik {
            background: linear-gradient(45deg, var(--primary-navy-btn) 0%, var(--secondary-navy-btn) 100%);
            border: none;
            color: var(--card-bg-ciamik);
            padding: 0.8rem 2rem; /* Padding tombol disesuaikan */
            border-radius: 50px; /* Radius sedikit dikurangi */
            font-weight: 600; /* Font weight disesuaikan */
            letter-spacing: 0.05em; /* Spacing huruf sedikit dikurangi */
            text-transform: uppercase;
            box-shadow: 0 8px 25px rgba(30, 42, 58, 0.4); /* Bayangan tombol lebih halus */
            transition: all 0.5s cubic-bezier(0.2, 0.8, 0.2, 1); /* Transisi lebih cepat */
            position: relative;
            overflow: hidden;
            z-index: 1;
            font-size: 0.9rem; /* Ukuran font tombol disesuaikan */
        }

        .btn-navy-produk-ciamik:hover {
            transform: translateY(-6px) scale(1.01); /* Efek melayang lebih subtle */
            box-shadow: 0 15px 40px rgba(30, 42, 58, 0.6); /* Bayangan lebih fokus */
            background: linear-gradient(45deg, var(--secondary-navy-btn) 0%, var(--primary-navy-btn) 100%);
        }

        /* Efek Shimmer Emas pada Tombol (lebih dinamis) */
        .btn-navy-produk-ciamik::before {
            content: '';
            position: absolute;
            top: 0;
            left: -150%; /* Jarak awal shimmer disesuaikan */
            width: 60%; /* Lebar shimmer disesuaikan */
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.6), transparent); /* Kilau putih lebih halus */
            transform: skewX(-20deg); /* Skew angle disesuaikan */
            transition: all 0.8s cubic-bezier(0.2, 0.8, 0.2, 1); /* Transisi lebih cepat */
            z-index: -1;
        }

        .btn-navy-produk-ciamik:hover::before {
            left: 150%; /* Jarak akhir shimmer disesuaikan */
        }

        .btn-navy-produk-ciamik .bi {
            color: var(--accent-gold-ciamik);
            transition: transform 0.4s ease, color 0.4s ease; /* Transisi lebih cepat */
        }

        .btn-navy-produk-ciamik:hover .bi {
            transform: translateX(5px) scale(1.1); /* Efek geser dan scale lebih subtle */
            color: var(--accent-gold-dark-ciamik);
        }

        .btn-navy-produk-ciamik:active {
            transform: translateY(-3px); /* Efek active lebih subtle */
            box-shadow: 0 6px 18px rgba(30, 42, 58, 0.3);
        }

        /* Alert Jika Tidak Ada Produk Lebih Berkesan (Tanpa Biru Muda) */
        .alert-info-ciamik {
            background-color: var(--alert-info-bg-ciamik);
            border: 1px solid var(--alert-info-text-ciamik); /* Border lebih tipis */
            color: var(--alert-info-text-ciamik);
            font-weight: 600; /* Font weight disesuaikan */
            border-radius: 1rem; /* Radius disesuaikan */
            font-size: 1.1rem; /* Ukuran font alert disesuaikan */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* Bayangan lebih halus */
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1.5;
            padding: 1.8rem !important; /* Padding disesuaikan */
        }

        .alert-info-ciamik .bi {
            font-size: 1.8rem; /* Ukuran ikon disesuaikan */
            vertical-align: middle;
            margin-right: 1rem; /* Margin disesuaikan */
            color: var(--alert-info-text-ciamik);
        }

        /* Responsif untuk Kesempurnaan Berkesan */
        @media (max-width: 1200px) {
            .product-page-container-ciamik {
                max-width: 960px; /* Lebar maksimum disesuaikan */
                padding: 3.5rem !important;
                border-radius: 1.6rem;
            }

            .section-title-ciamik {
                font-size: 3rem;
            }

            .section-description-ciamik {
                font-size: 1.1rem;
            }

            .produk-image-wrapper-ciamik {
                height: 240px;
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
                padding: 0.7rem 1.8rem;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 991px) {
            .product-page-container-ciamik {
                max-width: 720px;
                padding: 3rem !important;
                border-radius: 1.4rem;
                box-shadow: 0 10px 30px var(--shadow-light-ciamik), 0 0 0 1px var(--border-ciamik);
            }

            .section-title-ciamik {
                font-size: 2.8rem;
                letter-spacing: 0.05em;
            }

            .section-description-ciamik {
                font-size: 1rem;
            }

            .produk-card-ciamik {
                border-radius: 0.9rem;
                box-shadow: 0 6px 20px var(--shadow-light-ciamik), 0 10px 25px var(--shadow-medium-ciamik);
            }

            .produk-card-ciamik:hover {
                transform: translateY(-12px) scale(1.015);
                box-shadow: 0 15px 40px var(--shadow-medium-ciamik), 0 25px 60px var(--shadow-deep-ciamik);
            }

            .produk-image-wrapper-ciamik {
                height: 200px;
            }

            .produk-title-ciamik {
                font-size: 1.4rem;
            }

            .produk-description-ciamik {
                font-size: 0.88rem;
            }

            .price-value-ciamik {
                font-size: 1.1rem;
            }

            .btn-navy-produk-ciamik {
                padding: 0.65rem 1.6rem;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 767px) {
            .product-page-container-ciamik {
                padding: 2rem !important;
                margin-top: 1.5rem;
                margin-bottom: 1.5rem;
                border-radius: 1rem;
                box-shadow: none;
            }

            .product-page-container-ciamik::before {
                display: none;
            }

            .section-title-ciamik {
                font-size: 2.4rem;
                letter-spacing: 0.04em;
                text-shadow: 1.5px 1.5px 6px rgba(0, 0, 0, 0.2);
            }

            .section-title-ciamik::after {
                width: 60px;
                margin-top: 10px;
                height: 4px;
            }

            .section-description-ciamik {
                font-size: 0.95rem;
                margin-bottom: 3rem !important;
            }

            .col-sm-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .produk-card-ciamik {
                margin-left: auto;
                margin-right: auto;
                max-width: 400px; /* Lebar maksimal kartu disesuaikan */
                border-radius: 0.9rem;
                box-shadow: 0 6px 20px var(--shadow-light-ciamik);
            }

            .produk-card-ciamik:hover {
                transform: translateY(-6px) scale(1.005);
                box-shadow: 0 10px 25px var(--shadow-medium-ciamik);
            }

            .produk-image-wrapper-ciamik {
                height: 180px;
            }

            .produk-title-ciamik {
                font-size: 1.3rem;
            }

            .produk-description-ciamik {
                font-size: 0.85rem;
            }

            .produk-price-wrapper-ciamik {
                padding: 0.6rem 0.9rem;
            }

            .price-value-ciamik {
                font-size: 1.05rem;
            }

            .btn-navy-produk-ciamik {
                font-size: 0.8rem;
                padding: 0.6rem 1.4rem;
            }

            .card-body {
                padding: 1.5rem !important; /* Padding body kartu disesuaikan */
            }

            .alert-info-ciamik {
                font-size: 1rem;
                padding: 1.5rem !important;
            }

            .alert-info-ciamik .bi {
                font-size: 1.6rem;
                margin-right: 0.8rem;
            }
        }

        @media (max-width: 575px) {
            .section-title-ciamik {
                font-size: 2rem;
            }

            .section-title-ciamik::after {
                width: 50px;
                height: 3px;
            }

            .section-description-ciamik {
                font-size: 0.88rem;
                margin-bottom: 2.5rem !important;
            }

            .produk-image-wrapper-ciamik {
                height: 160px;
            }

            .produk-title-ciamik {
                font-size: 1.15rem;
            }

            .produk-description-ciamik {
                font-size: 0.8rem;
            }

            .price-value-ciamik {
                font-size: 1rem;
            }

            .btn-navy-produk-ciamik {
                font-size: 0.75rem;
                padding: 0.55rem 1.2rem;
            }
        }
    </style>
@endsection