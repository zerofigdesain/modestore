@extends('layouts.app')

@section('title', 'FAQ - Mitologi Clothing')

@section('content')
    <style>
        /* Menggunakan Poppins untuk konsistensi di seluruh website */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        /* Palet Warna Final yang Lebih Berkesan (Sama dengan produk.blade.php) */
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
            font-family: 'Poppins', sans-serif;
            background: var(--bg-body-gradient);
            color: var(--text-dark-ciamik);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Gaya untuk Kontainer Halaman FAQ Keseluruhan */
        .faq-super-container {
            padding: 5rem 1.5rem;
            background-color: var(--bg-page-ciamik); /* Latar belakang menggunakan variabel */
            min-height: 90vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Elemen dekoratif di latar belakang */
        .faq-super-container::before,
        .faq-super-container::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(30, 42, 58, 0.05);
            /* Menggunakan primary-navy-btn dengan transparansi */
            filter: blur(80px);
            z-index: 0;
        }

        .faq-super-container::before {
            width: 300px;
            height: 300px;
            top: -50px;
            left: -50px;
        }

        .faq-super-container::after {
            width: 400px;
            height: 400px;
            bottom: -80px;
            right: -80px;
            background: rgba(41, 128, 185, 0.08);
            /* Menggunakan price-color-ciamik dengan transparansi */
        }

        /* Gaya untuk Judul FAQ Paling Atas */
        .faq-grand-title {
            font-family: 'Poppins', sans-serif; /* Menggunakan Poppins */
            font-size: 4.2rem;
            font-weight: 800;
            color: var(--primary-navy-head); /* Menggunakan primary-navy-head */
            text-align: center;
            margin-bottom: 1.5rem;
            position: relative;
            letter-spacing: -1px;
            line-height: 1.1;
            z-index: 1;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.08);
        }

        .faq-grand-title span {
            color: var(--price-color-ciamik);
            /* Menggunakan price-color-ciamik sebagai aksen */
        }

        /* Subtitle Deskripsi di bawah judul utama */
        .faq-description {
            font-family: 'Poppins', sans-serif;
            font-size: 1.35rem;
            color: var(--text-muted-ciamik); /* Menggunakan text-muted-ciamik */
            text-align: center;
            margin-bottom: 4.5rem;
            max-width: 800px;
            line-height: 1.7;
            font-weight: 400;
            z-index: 1;
        }

        /* Gaya untuk Accordion Wrapper */
        .accordion-wrapper-ultra {
            width: 100%;
            max-width: 950px;
            background-color: var(--card-bg-ciamik); /* Menggunakan card-bg-ciamik */
            border-radius: 1.2rem;
            box-shadow: 0 25px 80px var(--shadow-medium-ciamik);
            /* Menggunakan shadow-medium-ciamik */
            overflow: hidden;
            border: 1px solid var(--border-ciamik);
            /* Menggunakan border-ciamik */
            z-index: 1;
        }

        /* Gaya untuk Setiap Item Accordion */
        .accordion-item-ultra {
            border: none;
            background-color: transparent;
            margin-bottom: 0;
            border-radius: 0;
            transition: all 0.4s ease-in-out;
            border-bottom: 1px solid var(--border-ciamik);
            /* Menggunakan border-ciamik */
        }

        .accordion-item-ultra:last-of-type {
            border-bottom: none;
        }

        /* Gaya untuk Tombol Accordion */
        .accordion-button-ultra {
            background-color: var(--card-bg-ciamik);
            color: var(--text-dark-ciamik);
            /* Warna teks default */
            font-family: 'Poppins', sans-serif;
            font-size: 1.25rem;
            font-weight: 600;
            padding: 2rem 2.5rem;
            border-radius: 0;
            border: none;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out, transform 0.2s ease-out;
            text-align: left;
            box-shadow: none !important;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .accordion-button-ultra:hover {
            background-color: var(--bg-page-ciamik);
            /* Menggunakan bg-page-ciamik */
            color: var(--primary-navy-head);
            /* Warna teks lebih gelap saat hover */
            transform: translateY(-3px);
            box-shadow: 0 5px 15px var(--shadow-light-ciamik);
            /* Menggunakan shadow-light-ciamik */
        }

        .accordion-button-ultra:not(.collapsed) {
            background: linear-gradient(45deg, var(--primary-navy-btn) 0%, var(--secondary-navy-btn) 100%);
            /* Gradien biru dongker dari palet */
            color: var(--card-bg-ciamik);
            /* Warna teks putih saat aktif */
            border-radius: 0;
            transform: translateY(0);
            box-shadow: none;
        }

        .accordion-button-ultra:focus {
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(41, 128, 185, 0.4) !important;
            /* Fokus biru dari price-color-ciamik */
        }

        /* Gaya untuk Icon Panah pada Tombol Accordion */
        .accordion-button-ultra::after {
            filter: invert(30%) sepia(10%) saturate(100%) hue-rotate(180deg) brightness(90%) contrast(80%);
            /* Warna panah default */
            transform: rotate(-90deg) !important;
            transition: transform 0.3s ease-in-out, filter 0.3s ease-in-out;
            font-size: 1.6rem;
            margin-left: 1.5rem;
        }

        .accordion-button-ultra:not(.collapsed)::after {
            filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);
            /* Warna putih saat aktif */
            transform: rotate(0deg) !important;
        }

        /* Gaya untuk Body Accordion (Bagian Jawaban) */
        .accordion-body-ultra {
            background-color: var(--bg-page-ciamik);
            /* Menggunakan bg-page-ciamik yang lebih solid */
            padding: 2rem 2.5rem;
            border-top: 1px dashed var(--border-ciamik);
            /* Garis putus-putus dengan border-ciamik */
            color: var(--text-muted-ciamik);
            /* Menggunakan text-muted-ciamik */
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .accordion-body-ultra a {
            color: var(--price-color-ciamik);
            /* Warna link biru dari palet */
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease-in-out, text-decoration 0.3s ease-in-out;
        }

        .accordion-body-ultra a:hover {
            color: var(--primary-navy-btn);
            /* Warna hover link ke primary-navy-btn */
            text-decoration: underline;
        }

        /* Penyesuaian untuk layar kecil (Mobile Responsiveness) */
        @media (max-width: 768px) {
            .faq-super-container {
                padding: 3rem 1rem;
            }

            .faq-grand-title {
                font-size: 2.8rem;
                margin-bottom: 1rem;
                letter-spacing: 0px;
            }

            .faq-description {
                font-size: 1rem;
                margin-bottom: 3rem;
                padding: 0 0.5rem;
            }

            .accordion-button-ultra,
            .accordion-body-ultra {
                padding: 1.5rem 1.75rem;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .faq-grand-title {
                font-size: 2.2rem;
            }

            .faq-description {
                font-size: 0.9rem;
                margin-bottom: 2rem;
            }

            .accordion-button-ultra,
            .accordion-body-ultra {
                padding: 1.2rem 1.5rem;
                font-size: 1rem;
            }

            .accordion-button-ultra::after {
                font-size: 1.4rem;
                margin-left: 1rem;
            }
        }
    </style>

    <div class="faq-super-container">
        <h2 class="faq-grand-title">
            Pertanyaan Umum <br> Seputar <span style="color: var(--primary-navy-btn);">Mitologi Clothing</span>
        </h2>
        <p class="faq-description">
            Kami telah mengumpulkan jawaban dari pertanyaan yang paling sering diajukan untuk membantu Anda. Jika Anda tidak menemukan jawaban di sini, jangan ragu untuk menghubungi tim dukungan kami.
        </p>

        <div class="accordion accordion-wrapper-ultra" id="faqAccordion">
            <div class="accordion-item accordion-item-ultra">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button accordion-button-ultra" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Bagaimana cara memesan produk di Mitologi Clothing?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body accordion-body-ultra">
                        Proses pemesanan sangat mudah! Anda dapat melihat panduan lengkap langkah demi langkah di halaman
                        <a href="{{ url('/cara-order') }}">Cara Order</a> kami. Mulai dari pemilihan desain, ukuran,
                        hingga metode pembayaran, semuanya dijelaskan secara detail.
                    </div>
                </div>
            </div>
            <div class="accordion-item accordion-item-ultra">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button accordion-button-ultra collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo">
                        Apakah Mitologi Clothing melayani pengiriman ke seluruh Indonesia?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body accordion-body-ultra">
                        Tentu saja! Kami bangga melayani pelanggan di seluruh penjuru Indonesia. Kami bermitra dengan jasa
                        ekspedisi terkemuka untuk memastikan pesanan Anda tiba dengan aman dan tepat waktu di mana pun Anda
                        berada.
                    </div>
                </div>
            </div>
            <div class="accordion-item accordion-item-ultra">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button accordion-button-ultra collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">
                        Berapa lama waktu pengerjaan pesanan?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body accordion-body-ultra">
                        Waktu pengerjaan bervariasi tergantung pada kompleksitas desain, jumlah pesanan, dan jenis produk
                        yang Anda pilih. Setelah semua detail pesanan disepakati, kami akan memberikan estimasi waktu
                        pengerjaan yang akurat.
                    </div>
                </div>
            </div>
            <div class="accordion-item accordion-item-ultra">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button accordion-button-ultra collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                        aria-controls="collapseFour">
                        Metode pembayaran apa saja yang diterima?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body accordion-body-ultra">
                        Kami menyediakan berbagai pilihan metode pembayaran untuk kemudahan Anda, termasuk transfer bank
                        (BCA, Mandiri, dll.) dan pembayaran melalui *e-wallet* tertentu. Detail lengkap akan muncul saat
                        proses *checkout*.
                    </div>
                </div>
            </div>
            <div class="accordion-item accordion-item-ultra">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button accordion-button-ultra collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                        aria-controls="collapseFive">
                        Bagaimana jika saya ingin mengubah atau membatalkan pesanan?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body accordion-body-ultra">
                        Untuk perubahan atau pembatalan pesanan, mohon segera hubungi tim dukungan pelanggan kami secepatnya. Kami akan berusaha membantu semaksimal mungkin, tergantung pada status pengerjaan pesanan Anda.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection