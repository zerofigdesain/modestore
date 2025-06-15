@extends('layouts.app')

@section('title', 'Home - Mitologi Clothing')

@section('content')
    <style>
        /*
         * Catatan: Gaya untuk 'body' HANYA didefinisikan di layouts/app.blade.php
         * untuk konsistensi global. Jangan duplikasi di sini.
         */

        /* Variabel Warna Kustom untuk Konsistensi */
        :root {
            --color-primary: #1A2A40; /* Biru Dongker Gelap - Dominan untuk Branding */
            --color-secondary: #0A1520; /* Hitam Sangat Gelap - Pelengkap Primary */
            --color-accent: #3498db; /* Biru Cerah - Untuk Ikon atau Penekanan Ringan */
            --color-light: #F8F8F8; /* Putih Hampir Murni - Latar Belakang Bersih */
            --color-gray-bg: #E0E0E0; /* Abu Terang - Latar Belakang Sekunder/Jumbotron */
            --color-gray-text: #555555; /* Abu Sedang - Teks Umum yang Mudah Dibaca */
            --color-gray-subtle: #777777; /* Abu Lebih Terang - Teks Subtly */
            --color-dark: #222222; /* Hitam Gelap - Untuk Garis atau Detail Tajam */

            --border-radius-md: 12px; /* Radius Sudut Sedang */
            --border-radius-lg: 20px; /* Radius Sudut Besar */
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.08); /* Bayangan Halus */
            --shadow-md: 0 8px 20px rgba(0, 0, 0, 0.1); /* Bayangan Sedang */
            --shadow-lg: 0 12px 30px rgba(0, 0, 0, 0.15); /* Bayangan Kuat */
            --shadow-hover: 0 10px 25px rgba(0, 0, 0, 0.15); /* Bayangan Saat Hover */

            --transition-speed: 0.4s; /* Transisi lebih lambat sedikit untuk efek 3D */
            --transition-ease: cubic-bezier(0.25, 0.46, 0.45, 0.94); /* Kurva ease yang lebih dramatis */

            /* Penambahan Variabel Font */
            --font-heading: 'Montserrat', sans-serif;
            --font-body: 'Poppins', sans-serif;
        }

        /* Import Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&family=Poppins:wght@300;400;500;600;700&display=swap');
        /* Import Font Awesome (pastikan Anda juga menautkannya di layouts/app.blade.php <head>) */
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');


        /* Gaya Umum untuk Font */
        body {
            font-family: var(--font-body); /* Terapkan Poppins ke seluruh body */
            overflow-x: hidden; /* Mencegah overflow horizontal */
        }

        /* Gaya Kustom untuk Jumbotron yang Selaras dengan Layout Utama */
        .jumbotron-custom {
            background: var(--color-light); /* Warna dasar terang */
            color: var(--color-gray-text);
            padding: 4rem 2.5rem 6rem; /* Padding lebih proporsional */
            border-radius: var(--border-radius-lg); /* Lebih melengkung */
            box-shadow: var(--shadow-md);
            transition: transform var(--transition-speed) var(--transition-ease),
                        box-shadow var(--transition-speed) var(--transition-ease);
            margin-bottom: 4rem; /* Margin bawah lebih besar */
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.03); /* Border yang sangat halus */
            /* Menambahkan perspective pada Jumbotron untuk efek 3D pada child */
            perspective: 1500px; /* Jarak pandang untuk efek 3D */
        }

        /* Latar Belakang Gradien Animasi untuk Jumbotron */
        .jumbotron-custom::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                var(--color-gray-bg) 0%,
                var(--color-light) 25%,
                var(--color-gray-bg) 50%,
                var(--color-light) 75%,
                var(--color-gray-bg) 100%
            );
            background-size: 200% 200%;
            animation: gradientShift 20s ease infinite; /* Animasi gradien */
            opacity: 0.6;
            z-index: -1; /* Posisikan di belakang konten */
            border-radius: var(--border-radius-lg);
        }

        @keyframes gradientShift {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
        }

        /* Garis di bawah Jumbotron (selalu terlihat, tanpa efek hover pada garis itu sendiri) */
        .jumbotron-custom::after { /* Mengganti ::before menjadi ::after agar tidak bentrok dengan animasi latar belakang */
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 8px; /* Garis lebih tebal */
            background-color: var(--color-primary); /* Warna Biru Dongker */
            border-bottom-left-radius: var(--border-radius-lg);
            border-bottom-right-radius: var(--border-radius-lg);
            transform: scaleX(1);
            opacity: 1;
            transition: all var(--transition-speed) var(--transition-ease);
            z-index: 0; /* Pastikan di atas latar belakang animasi */
        }

        /* Efek hover pada Jumbotron itu sendiri */
        .jumbotron-custom:hover {
            transform: translateY(-10px) rotateX(2deg) rotateY(3deg); /* Efek melayang dan rotasi 3D halus */
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2); /* Bayangan lebih kuat dan menyebar */
        }

        .jumbotron-custom h1 {
            font-family: var(--font-heading); /* Menggunakan Montserrat untuk judul Jumbotron */
            font-size: 3.8rem; /* Ukuran font judul yang menonjol */
            font-weight: 900;
            color: var(--color-primary); /* Biru Dongker */
            margin-bottom: 1.2rem;
            letter-spacing: -0.05em; /* Kompresi huruf yang elegan */
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.08); /* Bayangan teks yang lebih jelas dan dalam */
            transition: transform var(--transition-speed) var(--transition-ease);
        }
        .jumbotron-custom:hover h1 {
            transform: translateZ(20px); /* Efek "keluar" 3D pada judul */
        }


        .jumbotron-custom .lead {
            font-family: var(--font-body); /* Menggunakan Poppins untuk lead text */
            font-size: 1.6rem; /* Ukuran font lead yang lebih besar */
            color: var(--color-gray-text); /* Teks abu-abu netral */
            max-width: 900px;
            margin: 0 auto 2rem auto;
            font-weight: 300;
            transition: transform var(--transition-speed) var(--transition-ease);
        }
        .jumbotron-custom:hover .lead {
            transform: translateZ(15px); /* Efek "keluar" 3D pada lead */
        }

        .jumbotron-custom hr {
            border-top: 2px solid rgba(0, 0, 0, 0.1);
            width: 15%; /* Lebar garis yang proporsional */
            margin: 3rem auto;
            opacity: 0.6;
            transition: transform var(--transition-speed) var(--transition-ease);
        }
        .jumbotron-custom:hover hr {
            transform: translateZ(10px); /* Efek "keluar" 3D pada garis */
        }

        .jumbotron-custom p {
            font-family: var(--font-body); /* Menggunakan Poppins untuk paragraf Jumbotron */
            font-size: 1.2rem; /* Ukuran font paragraf yang nyaman dibaca */
            color: var(--color-gray-subtle);
            margin-bottom: 3rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            transition: transform var(--transition-speed) var(--transition-ease);
        }
        .jumbotron-custom:hover p {
            transform: translateZ(12px); /* Efek "keluar" 3D pada paragraf */
        }

        .jumbotron-custom .btn-primary {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
            padding: 1.2rem 3rem; /* Padding tombol lebih besar */
            font-size: 1.3rem; /* Ukuran font tombol lebih besar */
            font-weight: 700;
            border-radius: var(--border-radius-lg); /* Sudut lebih melengkung */
            transition: all var(--transition-speed) var(--transition-ease);
            box-shadow: 0 10px 20px rgba(26, 42, 64, 0.25); /* Bayangan tombol yang lebih kuat */
            letter-spacing: 0.05em; /* Spasi huruf lebih terbuka */
            text-transform: uppercase; /* Huruf kapital semua */
            font-family: var(--font-body); /* Menggunakan Poppins untuk tombol */
        }

        .jumbotron-custom .btn-primary:hover {
            background-color: var(--color-secondary); /* Warna hitam saat hover */
            border-color: var(--color-secondary);
            transform: translateY(-8px) scale(1.05) translateZ(30px); /* Efek melayang, sedikit zoom, dan keluar 3D yang lebih signifikan */
            box-shadow: 0 18px 40px rgba(26, 42, 64, 0.5); /* Bayangan tombol saat hover lebih kuat dan dalam */
        }

        /* Gaya Kustom untuk Kartu Fitur */
        .card-feature {
            border: none;
            border-radius: var(--border-radius-lg); /* Lebih melengkung */
            background-color: var(--color-light);
            box-shadow: var(--shadow-md);
            transition: all var(--transition-speed) var(--transition-ease);
            overflow: hidden;
            height: 100%;
            position: relative;
            z-index: 1;
            /* Menambahkan perspective pada kartu untuk efek 3D pada child */
            perspective: 1000px;
        }

        .card-feature:hover {
            transform: translateY(-15px) rotateX(3deg) rotateY(5deg); /* Efek melayang, rotasi 3D yang lebih terasa */
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.25); /* Bayangan lebih kuat dan menyebar */
        }

        /* Garis di atas Kartu Fitur (selalu terlihat, dengan perubahan warna saat hover) */
        .card-feature::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px; /* Garis lebih tebal */
            background-color: var(--color-primary); /* Warna Biru Dongker default */
            border-top-left-radius: var(--border-radius-lg);
            border-top-right-radius: var(--border-radius-lg);
            opacity: 1;
            transition: all var(--transition-speed) var(--transition-ease);
        }

        /* Perubahan warna garis atas Kartu Fitur saat hover */
        .card-feature:hover::before {
            background-color: var(--color-accent); /* Ganti warna ke biru cerah saat hover */
            opacity: 1;
        }

        .card-feature .card-body {
            padding: 3rem; /* Padding konten kartu lebih besar */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            position: relative; /* Penting untuk efek 3D pada child */
            z-index: 2; /* Pastikan konten di atas pseudo-element */
        }

        .card-feature .card-title {
            font-family: var(--font-heading); /* Menggunakan Montserrat untuk judul kartu */
            font-size: 2.2rem; /* Ukuran font judul kartu lebih besar */
            font-weight: 800;
            color: var(--color-primary);
            margin-bottom: 1.5rem;
            letter-spacing: -0.03em;
            transition: transform var(--transition-speed) var(--transition-ease);
        }
        .card-feature:hover .card-title {
            transform: translateZ(15px); /* Efek "keluar" 3D pada judul kartu */
        }

        .card-feature .card-text {
            font-family: var(--font-body); /* Menggunakan Poppins untuk teks kartu */
            color: var(--color-gray-text);
            font-size: 1.1rem; /* Ukuran font teks kartu lebih nyaman */
            line-height: 1.7;
            transition: transform var(--transition-speed) var(--transition-ease);
        }
        .card-feature:hover .card-text {
            transform: translateZ(10px); /* Efek "keluar" 3D pada teks kartu */
        }

        /* Gaya untuk Ikon di Kartu */
        .card-icon {
            font-size: 5rem; /* Ukuran ikon yang menonjol */
            color: var(--color-accent); /* Biru Cerah */
            margin-bottom: 2rem;
            display: block;
            text-align: center;
            transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55), color 0.4s ease-out; /* Kurva bouncing untuk ikon */
            will-change: transform, color; /* Memberi tahu browser untuk mengoptimalkan animasi */
        }

        .card-feature:hover .card-icon {
            transform: rotateY(25deg) scale(1.2) translateZ(40px); /* Efek rotasi 3D dan zoom yang lebih hidup serta keluar dari bidang */
            color: var(--color-primary); /* Berubah menjadi biru dongker saat hover */
        }

        /* Gaya untuk Bagian Heading Umum (seperti "Tentang Kami", "Mengapa Memilih Kami?", "Apa Kata Pelanggan Kami?") */
        .section-heading {
            font-family: var(--font-heading); /* Menggunakan Montserrat untuk section heading */
            font-size: 3.2rem; /* Ukuran font heading yang menonjol */
            font-weight: 900;
            color: var(--color-primary);
            margin-bottom: 2rem; /* Ruang bawah lebih besar */
            text-align: center;
            letter-spacing: -0.04em;
            position: relative;
            padding-bottom: 15px; /* Ruang di bawah teks judul untuk garis */
            /* Menambahkan sedikit efek 3D pada heading */
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.05);
            transition: all var(--transition-speed) var(--transition-ease);
        }
        .section-heading:hover {
             transform: translateY(-5px);
             color: var(--color-secondary);
        }


        /* Garis di bawah heading (hitam, kecil, seukuran teks) */
        .section-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px; /* Lebar garis tetap kecil, fokus */
            height: 4px; /* Ketinggian garis yang lebih jelas */
            background-color: var(--color-dark); /* Warna hitam gelap */
            border-radius: 2px;
            transition: width var(--transition-speed) var(--transition-ease),
                        background-color var(--transition-speed) var(--transition-ease);
        }
        .section-heading:hover::after {
            width: 120px; /* Garis melebar saat hover */
            background-color: var(--color-accent); /* Warna berubah */
        }

        .about-section img {
            border-radius: var(--border-radius-lg); /* Lebih melengkung */
            box-shadow: var(--shadow-md);
            max-width: 100%;
            height: auto;
            transition: transform var(--transition-speed) var(--transition-ease),
                        box-shadow var(--transition-speed) var(--transition-ease);
        }

        .about-section img:hover {
            transform: scale(1.05) rotateZ(1deg); /* Zoom sedikit lebih besar dan rotasi ringan */
            box-shadow: var(--shadow-lg);
        }

        .about-section p {
            font-family: var(--font-body); /* Menggunakan Poppins untuk paragraf about section */
            font-size: 1.1rem; /* Ukuran font paragraf yang nyaman dibaca */
            line-height: 1.8;
            color: var(--color-gray-text);
        }

        .testimonial-card {
            background-color: var(--color-light);
            border-radius: var(--border-radius-lg); /* Lebih melengkung */
            box-shadow: var(--shadow-sm);
            padding: 2.5rem; /* Padding lebih proporsional */
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .testimonial-card::before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 80px;
            height: 80px;
            background-color: var(--color-accent);
            border-radius: 50%;
            opacity: 0.1;
            filter: blur(20px);
            transition: all 0.5s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-10px) scale(1.02); /* Efek melayang dan sedikit zoom */
            box-shadow: var(--shadow-md);
        }
        .testimonial-card:hover::before {
            transform: scale(1.5);
            opacity: 0.2;
        }


        .testimonial-card .quote-icon {
            font-size: 4rem; /* Ukuran ikon quote yang menonjol */
            color: var(--color-accent); /* Biru Cerah */
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease, color 0.3s ease;
        }
        .testimonial-card:hover .quote-icon {
            transform: scale(1.1) rotate(5deg);
            color: var(--color-primary);
        }

        .testimonial-card p.text-muted {
            font-family: var(--font-body); /* Menggunakan Poppins untuk teks testimoni */
            font-style: italic;
            margin-bottom: 1.5rem;
            font-size: 1.05rem; /* Ukuran font testimoni lebih jelas */
            color: var(--color-gray-subtle);
        }

        .testimonial-card .author {
            font-family: var(--font-body); /* Menggunakan Poppins untuk nama penulis testimoni */
            font-weight: 700;
            color: var(--color-primary);
            font-size: 1.15rem; /* Ukuran font nama penulis lebih besar */
        }

        /* CSS BARU UNTUK CTA SECTION */
        .cta-section {
            background: linear-gradient(45deg, var(--color-primary), var(--color-secondary)); /* Gradien Biru Dongker ke Hitam */
            color: var(--color-light);
            padding: 5rem 3rem; /* Padding lebih besar */
            border-radius: var(--border-radius-lg); /* Lebih melengkung */
            text-align: center;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5); /* Bayangan lebih kuat dan dalam */
            margin-top: 5rem; /* Margin atas lebih besar */
            margin-bottom: 5rem;
            position: relative;
            overflow: hidden;
            perspective: 1000px; /* Tambahkan perspective untuk efek 3D pada konten */
            z-index: 1; /* Pastikan CTA di atas elemen lain jika ada tumpang tindih */
        }

        /* Pseudo-element untuk efek lingkaran beranimasi di latar belakang */
        .cta-section::before {
            content: '';
            position: absolute;
            top: -150px; /* Dimulai dari luar area atas-kiri */
            left: -150px;
            width: 300px;
            height: 300px;
            background-color: rgba(255, 255, 255, 0.08); /* Lingkaran putih transparan */
            border-radius: 50%;
            animation: pulseCircle 20s linear infinite alternate; /* Animasi pulsating circle */
            z-index: 0; /* Di bawah konten utama */
        }

        .cta-section::after {
            content: '';
            position: absolute;
            bottom: -150px; /* Dimulai dari luar area bawah-kanan */
            right: -150px;
            width: 250px;
            height: 250px;
            background-color: rgba(255, 255, 255, 0.08); /* Lingkaran putih transparan */
            border-radius: 50%;
            animation: pulseCircle 25s linear infinite alternate-reverse; /* Animasi pulsating circle terbalik */
            z-index: 0; /* Di bawah konten utama */
        }

        /* Keyframes untuk animasi lingkaran */
        @keyframes pulseCircle {
            0% { transform: translate(0, 0) scale(1); opacity: 0.8; }
            100% { transform: translate(50px, 50px) scale(1.2); opacity: 0; }
        }

        /* Gaya untuk Judul H2 di CTA */
        .cta-section h2 {
            font-family: var(--font-heading); /* Menggunakan Montserrat untuk judul CTA */
            font-size: 3.5rem; /* Ukuran judul CTA yang menonjol */
            font-weight: 900;
            margin-bottom: 1.5rem;
            letter-spacing: -0.05em; /* Spasi antar huruf sedikit rapat */
            text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.4); /* Bayangan teks lebih kuat */
            -webkit-text-stroke: 0.5px rgba(0, 0, 0, 0.1); /* Stroke tipis untuk definisi */
            transform: translateZ(20px); /* Sedikit keluar dari bidang untuk efek 3D */
            position: relative;
            z-index: 2; /* Di atas pseudo-element */
        }

        /* Gaya untuk Paragraf di CTA */
        .cta-section p {
            font-family: var(--font-body); /* Menggunakan Poppins untuk paragraf CTA */
            font-size: 1.4rem; /* Ukuran paragraf CTA yang lebih besar */
            max-width: 800px;
            margin: 0 auto 2.5rem auto; /* Margin bawah lebih besar */
            opacity: 0.95;
            line-height: 1.7; /* Jarak antar baris */
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3); /* Bayangan teks lebih dalam */
            transform: translateZ(10px); /* Sedikit keluar dari bidang untuk efek 3D */
            position: relative;
            z-index: 2; /* Di atas pseudo-element */
        }

        /* Gaya untuk Tombol di CTA */
        .cta-section .btn-light {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.7) 100%); /* Gradien halus */
            color: var(--color-primary); /* Warna teks biru dongker */
            border: none; /* Hilangkan border default */
            padding: 1.4rem 3.6rem; /* Padding tombol lebih besar */
            font-size: 1.5rem; /* Ukuran font tombol lebih besar */
            font-weight: 700;
            border-radius: var(--border-radius-lg); /* Lebih melengkung */
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35); /* Bayangan standar tombol */
            transition: transform 0.3s var(--transition-ease), box-shadow 0.3s var(--transition-ease); /* Transisi untuk hover */
            text-transform: uppercase;
            letter-spacing: 0.06em; /* Spasi antar huruf */
            font-family: var(--font-body); /* Menggunakan Poppins untuk tombol CTA */
            position: relative;
            z-index: 2; /* Di atas pseudo-element */
            display: inline-flex; /* Untuk menyejajarkan ikon dan teks */
            align-items: center; /* Untuk menyejajarkan ikon dan teks */
            justify-content: center;
        }

        .cta-section .btn-light i {
            margin-right: 12px; /* Spasi antara ikon dan teks */
            font-size: 1.6rem; /* Ukuran ikon */
            color: var(--color-primary);
        }

        /* Efek Hover untuk Tombol CTA */
        .cta-section .btn-light:hover {
            transform: translateY(-5px) scale(1.03) rotateZ(-2deg); /* Efek melayang, sedikit zoom, dan rotasi halus */
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.5); /* Bayangan lebih kuat saat hover */
        }

        /* Efek Active (saat diklik) untuk Tombol CTA */
        .cta-section .btn-light:active {
            transform: translateY(0) scale(1); /* Efek sedikit "menekan" saat diklik */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        /* Responsivitas yang Ditingkatkan */
        @media (max-width: 991.98px) {
            .jumbotron-custom {
                padding: 3rem 2rem 5rem;
                margin-bottom: 3rem;
            }
            .jumbotron-custom h1 {
                font-size: 3rem;
            }
            .jumbotron-custom .lead {
                font-size: 1.4rem;
            }
            .jumbotron-custom p {
                font-size: 1rem;
            }
            .jumbotron-custom .btn-primary {
                padding: 1rem 2.5rem;
                font-size: 1.1rem;
            }
            .card-feature .card-body {
                padding: 2.5rem;
            }
            .card-feature .card-title {
                font-size: 1.8rem;
            }
            .card-feature .card-text {
                font-size: 1rem;
            }
            .card-icon {
                font-size: 4rem;
            }
            .section-heading {
                font-size: 2.5rem;
                margin-bottom: 1.5rem;
            }
            .section-heading::after {
                height: 3px;
            }
            .cta-section { /* SESUAIKAN DENGAN RESPONSIVITAS CTA */
                padding: 4rem 2.5rem;
                margin-top: 4rem;
                margin-bottom: 4rem;
            }
            .cta-section h2 { /* SESUAIKAN DENGAN RESPONSIVITAS CTA */
                font-size: 2.8rem;
            }
            .cta-section p { /* SESUAIKAN DENGAN RESPONSIVITAS CTA */
                font-size: 1.2rem;
            }
            .cta-section .btn-light { /* SESUAIKAN DENGAN RESPONSIVITAS CTA */
                padding: 1rem 2.5rem;
                font-size: 1.2rem;
            }
        }

        @media (max-width: 767.98px) {
            .jumbotron-custom {
                padding: 2.5rem 1.5rem 4rem;
                margin-bottom: 2.5rem;
            }
            .jumbotron-custom h1 {
                font-size: 2.5rem;
                letter-spacing: normal;
            }
            .jumbotron-custom .lead {
                font-size: 1.2rem;
                margin-bottom: 1.5rem;
            }
            .jumbotron-custom p {
                font-size: 0.95rem;
                margin-bottom: 2rem;
            }
            .jumbotron-custom .btn-primary {
                padding: 0.9rem 2rem;
                font-size: 1rem;
            }
            .card-feature .card-body {
                padding: 2rem;
            }
            .card-feature .card-title {
                font-size: 1.6rem;
            }
            .card-icon {
                font-size: 3.5rem;
            }
            .section-heading {
                font-size: 2.2rem;
                padding-bottom: 10px;
            }
            .section-heading::after {
                height: 2.5px;
            }
            .about-section img {
                margin-bottom: 2rem;
            }
            .testimonial-card {
                padding: 2rem;
            }
            .testimonial-card .quote-icon {
                font-size: 3.5rem;
                margin-bottom: 1rem;
            }
            .testimonial-card p.text-muted {
                font-size: 1rem;
            }
            .testimonial-card .author {
                font-size: 1rem;
            }
            .cta-section { /* SESUAIKAN DENGAN RESPONSIVITAS CTA */
                padding: 3.5rem 2rem;
                margin-top: 3rem;
                margin-bottom: 3rem;
            }
            .cta-section h2 { /* SESUAIKAN DENGAN RESPONSIVITAS CTA */
                font-size: 2.2rem;
            }
            .cta-section p { /* SESUAIKAN DENGAN RESPONSIVITAS CTA */
                font-size: 1.1rem;
            }
            .cta-section .btn-light { /* SESUAIKAN DENGAN RESPONSIVITAS CTA */
                padding: 0.9rem 2.2rem;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 575.98px) {
            .jumbotron-custom {
                padding: 2rem 1rem 3rem;
                margin-bottom: 2rem;
            }
            .jumbotron-custom h1 {
                font-size: 2rem;
            }
            .jumbotron-custom .lead {
                font-size: 1rem;
                margin-bottom: 1rem;
            }
            .jumbotron-custom p {
                font-size: 0.85rem;
                margin-bottom: 1rem;
            }
            .jumbotron-custom .btn-primary {
                padding: 0.7rem 1.5rem;
                font-size: 0.9rem;
            }
            .card-feature .card-body {
                padding: 1.5rem;
            }
            .card-feature .card-title {
                font-size: 1.2rem;
            }
            .card-feature .card-text {
                font-size: 0.9rem;
            }
            .card-icon {
                font-size: 3rem;
                margin-bottom: 1rem;
            }
            .section-heading {
                font-size: 1.8rem;
                padding-bottom: 8px;
            }
            .section-heading::after {
                width: 60px;
                height: 2px;
            }
            .testimonial-card {
                padding: 1.5rem;
            }
            .testimonial-card .quote-icon {
                font-size: 3rem;
                margin-bottom: 1rem;
            }
            .testimonial-card p.text-muted {
                font-size: 0.9rem;
                margin-bottom: 1rem;
            }
            .testimonial-card .author {
                font-size: 0.95rem;
            }
            .cta-section { /* SESUAIKAN DENGAN RESPONSIVITAS CTA */
                padding: 3rem 1.5rem;
                margin-top: 2.5rem;
                margin-bottom: 2.5rem;
            }
            .cta-section h2 { /* SESUAIKAN DENGAN RESPONSIVITAS CTA */
                font-size: 1.8rem;
            }
            .cta-section p { /* SESUAIKAN DENGAN RESPONSIVITAS CTA */
                font-size: 0.9rem;
            }
            .cta-section .btn-light { /* SESUAIKAN DENGAN RESPONSIVITAS CTA */
                padding: 0.7rem 1.6rem;
                font-size: 1rem;
                flex-direction: column; /* Ikon di atas teks pada layar kecil */
                gap: 5px; /* Spasi antar ikon dan teks */
            }
            .cta-section .btn-light i { /* SESUAIKAN DENGAN RESPONSIVITAS CTA */
                margin-right: 0;
                margin-bottom: 5px;
            }
        }
    </style>

    <div class="jumbotron jumbotron-custom">
        <h1 class="display-4">Selamat Datang di Mitologi Clothing!</h1>
        <p class="lead">Solusi terbaik untuk kebutuhan konveksi Anda di Indramayu.</p>
        <hr class="my-4">
        <p>Kami melayani pembuatan kaos, jaket, kemeja, dan berbagai produk konveksi lainnya dengan kualitas terbaik, didukung oleh tim profesional dan teknologi mutakhir.</p>
        <a class="btn btn-primary btn-lg" href="{{ url('/produk') }}" role="button">Jelajahi Produk Kami</a>
    </div>

    <section class="container my-5 about-section">
        <h2 class="section-heading">Tentang Kami</h2>
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('images/about-us-placeholder.jpg') }}" alt="Tentang Mitologi Clothing" class="img-fluid">
            </div>
            <div class="col-md-6">
                <p class="mb-3">Mitologi Clothing berdiri dengan misi untuk menyediakan solusi konveksi terdepan di Indramayu. Kami memadukan keahlian tradisional dengan teknologi modern untuk menghasilkan pakaian berkualitas tinggi yang sesuai dengan standar dan harapan Anda.</p>
                <p class="mb-3">Kami bangga menjadi mitra terpercaya bagi individu, komunitas, hingga perusahaan yang mencari produk konveksi custom dengan perhatian pada detail dan kepuasan pelanggan.</p>
                <a href="{{ url('/about-us') }}" class="btn btn-outline-primary">Pelajari Lebih Lanjut <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <h2 class="section-heading">Mengapa Memilih Kami?</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card card-feature">
                    <div class="card-body">
                        <i class="fas fa-tshirt card-icon"></i>
                        <h5 class="card-title">Kualitas Premium</h5>
                        <p class="card-text">Kami menggunakan bahan terbaik dan proses produksi yang cermat untuk memastikan setiap produk memenuhi standar kualitas tertinggi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-feature">
                    <div class="card-body">
                        <i class="fas fa-palette card-icon"></i>
                        <h5 class="card-title">Desain Kustom Fleksibel</h5>
                        <p class="card-text">Wujudkan ide Anda menjadi kenyataan! Kami menyediakan layanan desain kustom yang sepenuhnya fleksibel untuk memenuhi keinginan unik Anda.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card card-feature">
                    <div class="card-body">
                        <i class="fas fa-handshake card-icon"></i>
                        <h5 class="card-title">Pelayanan Terbaik</h5>
                        <p class="card-text">Kepuasan Anda adalah prioritas kami. Tim kami siap membantu Anda dari konsultasi awal hingga produk jadi, dengan respons cepat dan ramah.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <h2 class="section-heading">Apa Kata Pelanggan Kami?</h2>
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="testimonial-card">
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p class="text-muted">"Kualitas kaosnya luar biasa, sablonnya rapi, dan respons timnya sangat cepat. Sangat direkomendasikan!"</p>
                    <span class="author">- Deco Mahendra</span>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="testimonial-card">
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p class="text-muted">"Jaket pesanan komunitas kami hasilnya persis seperti yang diharapkan, bahkan lebih baik. Terima kasih Mitologi Clothing!"</p>
                    <span class="author">- Ilham Maulana Jafar</span>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="testimonial-card">
                    <i class="fas fa-quote-left quote-icon"></i>
                    <p class="text-muted">"Pesan kemeja untuk seragam kantor di sini, hasilnya sangat memuaskan. Jahitan rapi dan bahan nyaman dipakai."</p>
                    <span class="author">- Dian Rahmawati</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container cta-section">
        <h2>Hubungi Kami Sekarang!</h2>
        <p>Siap untuk membuat produk konveksi impian Anda? Jangan ragu untuk menghubungi kami untuk konsultasi gratis atau permintaan penawaran.</p>
        <a href="{{ url('/contact') }}" class="btn btn-light btn-lg">
            <i class="fas fa-phone-alt"></i> Hubungi Kami
        </a>
    </section>
@endsection