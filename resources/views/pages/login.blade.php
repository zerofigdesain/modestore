@extends('layouts.app')

@section('title', 'Login - Mitologi Clothing')

@section('content')
    <style>
        /* Menggunakan Poppins untuk font yang modern dan bersih - pastikan ini dimuat di layouts.app atau di sini */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        /* Pastikan elemen yang membungkus card login memusatkan konten */
        /* Gaya ini TIDAK memengaruhi body, hanya kontainer login */
        .row.justify-content-center {
            /* Pastikan kontainer ini mengambil ruang yang cukup untuk pemusatan vertikal */
            /* Sesuaikan min-height ini agar sesuai dengan kebutuhan layout utama Anda */
            /* Misalnya, jika ada navbar di atas, min-height bisa disesuaikan */
            min-height: calc(100vh - var(--navbar-height, 80px) - var(--footer-height, 60px)); /* Contoh adaptif */
            align-items: center; /* Memusatkan card secara vertikal */
            padding-top: 50px; /* Tambahan padding atas jika diperlukan, atau sesuaikan margin-top card */
            padding-bottom: 50px; /* Tambahan padding bawah jika diperlukan */
        }

        .card {
            border: none;
            border-radius: 20px; /* Sudut lebih membulat untuk tampilan premium */
            /* Bayangan yang lebih dalam dan menyebar untuk efek mengambang */
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            /* Sedikit transparansi pada kartu untuk kesan modern */
            background-color: rgba(255, 255, 255, 0.98);
            /* Efek blur pada latar belakang kartu (fitur CSS3 modern) */
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px); /* Kompatibilitas Safari */
            transition: transform 0.4s ease, box-shadow 0.4s ease; /* Transisi halus */
            font-family: 'Poppins', sans-serif; /* Aplikasikan font langsung ke card */
            color: #333; /* Warna teks default di dalam card */
        }

        .card:hover {
            transform: translateY(-8px); /* Mengangkat kartu saat hover */
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35); /* Bayangan lebih intens saat hover */
        }

        .card-header {
            /* Gradien untuk header, memberikan kesan mewah */
            background: linear-gradient(45deg, #2C3E50 0%, #1A1A1A 100%);
            color: #ffffff;
            padding: 30px 25px; /* Padding lebih besar */
            border-bottom: none;
            font-weight: 700; /* Lebih tebal */
            font-size: 1.9rem; /* Lebih besar lagi */
            letter-spacing: 2px; /* Jarak antar huruf lebih lebar */
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
            border-top-left-radius: 20px; /* Memastikan radius sudut tetap */
            border-top-right-radius: 20px;
        }

        .card-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px; /* Garis aksen lebih panjang */
            height: 5px; /* Lebih tebal */
            background-color: #3498db; /* Biru cerah sebagai aksen kuat */
            border-radius: 3px;
            box-shadow: 0 2px 10px rgba(52, 152, 219, 0.5); /* Bayangan pada garis aksen */
        }

        .card-body {
            padding: 50px 40px; /* Padding lebih luas untuk ruang bernapas */
            background-color: #ffffff;
            border-bottom-left-radius: 20px; /* Memastikan radius sudut tetap */
            border-bottom-right-radius: 20px;
        }

        .form-label {
            font-weight: 600; /* Lebih tebal */
            color: #2c3e50; /* Biru dongker gelap untuk label */
            margin-bottom: 10px; /* Jarak yang nyaman */
            font-size: 1rem; /* Ukuran label yang pas */
        }

        .form-control {
            border-radius: 12px; /* Lebih membulat */
            padding: 16px 20px; /* Padding lebih lega */
            border: 1px solid #e0e0e0; /* Border lebih tipis dan halus */
            background-color: #f8f8f8; /* Latar belakang input sedikit abu-abu */
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05); /* Inner shadow yang lebih terlihat */
        }

        .form-control:focus {
            border-color: #3498db; /* Biru cerah saat fokus */
            background-color: #ffffff; /* Latar putih saat fokus */
            box-shadow: 0 0 0 0.3rem rgba(52, 152, 219, 0.25), inset 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            /* Gradien yang menarik untuk tombol */
            background: linear-gradient(45deg, #3498db 0%, #2980b9 100%);
            border: none;
            padding: 18px 0; /* Tombol lebih tinggi dan mudah diklik */
            font-size: 1.2rem; /* Ukuran font tombol lebih besar */
            font-weight: 700; /* Sangat tebal */
            border-radius: 12px; /* Lebih membulat */
            transition: all 0.3s ease;
            letter-spacing: 0.8px; /* Jarak huruf pada tombol */
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.4); /* Bayangan tombol yang menonjol */
            text-transform: uppercase; /* Huruf kapital semua untuk tombol */
        }

        .btn-primary:hover {
            transform: translateY(-5px); /* Efek mengangkat yang lebih dramatis saat hover */
            box-shadow: 0 12px 30px rgba(52, 152, 219, 0.6); /* Bayangan lebih kuat saat hover */
            filter: brightness(1.15); /* Sedikit lebih terang */
        }

        .alert {
            border-radius: 12px;
            padding: 20px 25px;
            margin-bottom: 30px; /* Jarak lebih besar */
            font-size: 1rem;
            border: 1px solid transparent;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); /* Bayangan halus pada alert */
            animation: fadeIn 0.5s ease-out; /* Animasi fade-in */
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .text-danger {
            font-size: 0.85rem;
            margin-top: 8px;
            display: block;
            color: #e74c3c; /* Merah yang lebih jelas dan kuat */
            font-weight: 500;
        }

        .form-check-label {
            color: #555;
            font-weight: 400;
            font-size: 0.95rem;
        }

        .form-check-input {
            width: 1.2em; /* Checkbox sedikit lebih besar */
            height: 1.2em;
            border-color: #bbb;
            transition: background-color 0.2s ease, border-color 0.2s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1); /* Bayangan pada checkbox */
        }

        .form-check-input:checked {
            background-color: #3498db;
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .forgot-password-link, .register-link {
            color: #3498db;
            text-decoration: none;
            font-weight: 600; /* Lebih tebal */
            transition: color 0.2s ease, text-decoration 0.2s ease, transform 0.2s ease;
            font-size: 0.95rem;
            display: inline-block; /* Untuk efek transform */
        }
        .forgot-password-link:hover, .register-link:hover {
            color: #2980b9;
            text-decoration: underline;
            transform: translateX(3px); /* Sedikit bergeser saat hover */
        }

        p.text-center.mt-4 {
            font-size: 0.95rem;
            color: #7f8c8d;
            line-height: 1.5;
        }

        /* Animasi Fade-in */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    <div class="row justify-content-center align-items-center"> {{-- Centering vertikal --}}
        <div class="col-md-5 col-lg-4"> {{-- Ukuran kolom disesuaikan --}}
            <div class="card">
                <div class="card-header text-center">
                    Masuk ke Mitologi Clothing
                </div>
                <div class="card-body">
                    <form action="{{ route('login.authenticate') }}" method="POST">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul class="mb-0 list-unstyled"> {{-- Menghilangkan bullet point default --}}
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-4"> {{-- Margin bawah lebih besar --}}
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Contoh: nama@domain.com">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4"> {{-- Margin bawah lebih besar --}}
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Minimal 8 karakter">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4"> {{-- Penataan rata kiri-kanan --}}
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ingat Saya</label>
                            </div>
                            <div>
                                <a href="#" class="forgot-password-link">Lupa Kata Sandi?</a> {{-- Link lupa password --}}
                            </div>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary">Masuk</button>
                        </div>

                        <p class="text-center mt-4">
                            Belum punya akun? <a href="{{ route('register') }}" class="register-link">Daftar Sekarang</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection