@extends('layouts.app')

@section('title', 'FAQ - Mitologi Clothing')

@section('content')
    <style>
        /* Impor Font Google Fonts (Montserrat & Inter) untuk tipografi modern */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Inter:wght@300;400;500;600&display=swap');

        /* Gaya untuk Kontainer Halaman FAQ Keseluruhan */
        .faq-super-container {
            padding: 5rem 1.5rem; /* Padding lebih besar untuk kesan sangat lega */
            background: linear-gradient(to bottom, #f9fbfd, #e9ecef); /* Gradien latar belakang lembut */
            min-height: 90vh; /* Pastikan halaman tinggi dan terisi penuh */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden; /* Penting untuk elemen dekoratif */
        }

        /* Elemen dekoratif di latar belakang */
        .faq-super-container::before,
        .faq-super-container::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(52, 152, 219, 0.08); /* Lingkaran biru transparan */
            filter: blur(80px); /* Efek blur yang lembut */
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
            background: rgba(44, 62, 80, 0.05); /* Lingkaran biru dongker transparan */
        }

        /* Gaya untuk Judul FAQ Paling Atas */
        .faq-grand-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 4.2rem; /* Ukuran font ekstra besar */
            font-weight: 800; /* Lebih tebal lagi */
            color: #1a202c; /* Hampir hitam pekat */
            text-align: center;
            margin-bottom: 1.5rem;
            position: relative;
            letter-spacing: -1px; /* Sedikit rapat untuk kesan modern */
            line-height: 1.1;
            z-index: 1; /* Pastikan di atas elemen dekoratif */
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.08); /* Bayangan teks lebih jelas */
        }

        .faq-grand-title span {
            color: #3498db; /* Aksen warna biru pada bagian tertentu */
        }

        /* Subtitle Deskripsi di bawah judul utama */
        .faq-description {
            font-family: 'Inter', sans-serif;
            font-size: 1.35rem; /* Ukuran font lebih besar */
            color: #4a5568; /* Abu-abu kebiruan gelap */
            text-align: center;
            margin-bottom: 4.5rem; /* Jarak yang sangat lega dari accordion */
            max-width: 800px;
            line-height: 1.7;
            font-weight: 400;
            z-index: 1;
        }

        /* Gaya untuk Accordion Wrapper */
        .accordion-wrapper-ultra {
            width: 100%;
            max-width: 950px; /* Lebar maksimal lebih besar */
            background-color: #ffffff; /* Latar belakang putih bersih */
            border-radius: 1.2rem; /* Sudut lebih membulat */
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.15); /* Bayangan sangat dalam dan premium */
            overflow: hidden; /* Penting untuk border-radius */
            border: 1px solid rgba(0, 0, 0, 0.05); /* Border tipis halus */
            z-index: 1;
        }

        /* Gaya untuk Setiap Item Accordion */
        .accordion-item-ultra {
            border: none;
            background-color: transparent;
            margin-bottom: 0; /* Tanpa margin antar item */
            border-radius: 0; /* Hilangkan radius individu untuk item */
            transition: all 0.4s ease-in-out;
            border-bottom: 1px solid #ebf1f5; /* Garis pemisah antar item */
        }

        .accordion-item-ultra:last-of-type {
            border-bottom: none; /* Hilangkan garis bawah pada item terakhir */
        }

        /* Gaya untuk Tombol Accordion */
        .accordion-button-ultra {
            background-color: #ffffff; /* Latar belakang putih */
            color: #2d3748; /* Warna teks abu-abu kebiruan gelap */
            font-family: 'Inter', sans-serif;
            font-size: 1.25rem; /* Ukuran font lebih besar */
            font-weight: 600; /* Tebal sedang */
            padding: 2rem 2.5rem; /* Padding yang sangat sangat lega */
            border-radius: 0; /* Hilangkan radius default tombol */
            border: none;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out, transform 0.2s ease-out;
            text-align: left;
            box-shadow: none !important;
            position: relative;
            display: flex; /* Gunakan flexbox untuk alignment panah */
            justify-content: space-between; /* Panah di paling kanan */
            align-items: center;
        }

        .accordion-button-ultra:hover {
            background-color: #f0f4f7; /* Latar belakang sedikit berubah saat hover */
            color: #1a202c; /* Teks lebih gelap saat hover */
            transform: translateY(-3px); /* Efek terangkat lebih terasa */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05); /* Bayangan lembut saat hover */
        }

        .accordion-button-ultra:not(.collapsed) {
            background: linear-gradient(to right, #2c3e50, #34495e); /* Gradien biru dongker saat aktif */
            color: #e0e6ed; /* Warna teks putih keabu-abuan saat aktif */
            border-radius: 0; /* Tetap tanpa radius */
            transform: translateY(0); /* Reset transform saat aktif */
            box-shadow: none; /* Hilangkan bayangan saat aktif */
        }

        .accordion-button-ultra:focus {
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.35) !important; /* Fokus biru yang lebih menonjol */
        }

        /* Gaya untuk Icon Panah pada Tombol Accordion */
        .accordion-button-ultra::after {
            filter: invert(30%) sepia(10%) saturate(100%) hue-rotate(180deg) brightness(90%) contrast(80%); /* Warna panah default */
            transform: rotate(-90deg) !important; /* Memutar panah ke samping default */
            transition: transform 0.3s ease-in-out, filter 0.3s ease-in-out;
            font-size: 1.6rem; /* Ukuran panah lebih besar */
            margin-left: 1.5rem; /* Jarak dari teks */
        }

        .accordion-button-ultra:not(.collapsed)::after {
            filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%); /* Warna putih saat aktif */
            transform: rotate(0deg) !important; /* Kembali ke posisi semula saat aktif */
        }

        /* Gaya untuk Body Accordion (Bagian Jawaban) */
        .accordion-body-ultra {
            background-color: #fdfdfe; /* Latar belakang sedikit off-white */
            padding: 2rem 2.5rem; /* Padding yang sangat konsisten */
            border-top: 1px dashed #e0e0e0; /* Garis pemisah putus-putus yang elegan */
            color: #4a5568; /* Warna teks abu-abu gelap */
            font-family: 'Inter', sans-serif;
            font-size: 1.1rem; /* Ukuran font sedikit lebih besar */
            line-height: 1.8; /* Tinggi baris sangat lega */
        }

        .accordion-body-ultra a {
            color: #3498db; /* Warna link biru terang */
            text-decoration: none;
            font-weight: 500; /* Link sedikit lebih tebal */
            transition: color 0.3s ease-in-out, text-decoration 0.3s ease-in-out;
        }

        .accordion-body-ultra a:hover {
            color: #2980b9;
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
            .accordion-button-ultra, .accordion-body-ultra {
                padding: 1.5rem 1.75rem;
                font-size: 1.1rem;
            }
        }
    </style>

    <div class="faq-super-container">
        <h2 class="faq-grand-title">
            Pertanyaan Umum <br> Seputar <span style="color: #2c3e50;">Mitologi Clothing</span>
        </h2>
        <p class="faq-description">
            Kami telah mengumpulkan jawaban dari pertanyaan yang paling sering diajukan untuk membantu Anda. Jika Anda tidak menemukan jawaban di sini, jangan ragu untuk menghubungi tim dukungan kami.
        </p>

        <div class="accordion accordion-wrapper-ultra" id="faqAccordion">
            <div class="accordion-item accordion-item-ultra">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button accordion-button-ultra" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Bagaimana cara memesan produk di Mitologi Clothing?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body accordion-body-ultra">
                        Proses pemesanan sangat mudah! Anda dapat melihat panduan lengkap langkah demi langkah di halaman <a href="{{ url('/cara-order') }}">Cara Order</a> kami. Mulai dari pemilihan desain, ukuran, hingga metode pembayaran, semuanya dijelaskan secara detail.
                    </div>
                </div>
            </div>
            <div class="accordion-item accordion-item-ultra">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button accordion-button-ultra collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Apakah Mitologi Clothing melayani pengiriman ke seluruh Indonesia?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body accordion-body-ultra">
                        Tentu saja! Kami bangga melayani pelanggan di seluruh penjuru Indonesia. Kami bermitra dengan jasa ekspedisi terkemuka untuk memastikan pesanan Anda tiba dengan aman dan tepat waktu di mana pun Anda berada.
                    </div>
                </div>
            </div>
            <div class="accordion-item accordion-item-ultra">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button accordion-button-ultra collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Berapa lama waktu pengerjaan pesanan?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body accordion-body-ultra">
                        Waktu pengerjaan bervariasi tergantung pada kompleksitas desain, jumlah pesanan, dan jenis produk yang Anda pilih. Setelah semua detail pesanan disepakati, kami akan memberikan estimasi waktu pengerjaan yang akurat.
                    </div>
                </div>
            </div>
            <div class="accordion-item accordion-item-ultra">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button accordion-button-ultra collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Metode pembayaran apa saja yang diterima?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body accordion-body-ultra">
                        Kami menyediakan berbagai pilihan metode pembayaran untuk kemudahan Anda, termasuk transfer bank (BCA, Mandiri, dll.) dan pembayaran melalui *e-wallet* tertentu. Detail lengkap akan muncul saat proses *checkout*.
                    </div>
                </div>
            </div>
            <div class="accordion-item accordion-item-ultra">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button accordion-button-ultra collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Bagaimana jika saya ingin mengubah atau membatalkan pesanan?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body accordion-body-ultra">
                        Untuk perubahan atau pembatalan pesanan, mohon segera hubungi tim dukungan pelanggan kami secepatnya. Kami akan berusaha membantu semaksimal mungkin, tergantung pada status pengerjaan pesanan Anda.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection