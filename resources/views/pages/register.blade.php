@extends('layouts.app')

@section('title', 'Register - Mitologi Clothing')

@section('content')
{{-- Kontainer utama dengan latar belakang putih polos --}}
<div class="register-page-container">
    <div class="register-card"> {{-- Kartu registrasi utama dengan efek glassmorphism yang ditingkatkan --}}
        <div class="register-card-header">
            <h4>Daftar Akun Baru</h4>
        </div>
        <div class="register-card-body">
            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                {{-- Menampilkan semua error validasi secara umum (jika ada) --}}
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-4 input-group-elegant">
                    <label for="name" class="form-label-elegant">Nama Lengkap</label>
                    <div class="input-icon-wrapper">
                        <i class="fas fa-user input-icon"></i> {{-- Ikon User (membutuhkan Font Awesome) --}}
                        <input type="text" class="form-control-elegant @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Masukkan nama lengkap Anda">
                    </div>
                    @error('name')
                        <div class="text-danger-elegant">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4 input-group-elegant">
                    <label for="email" class="form-label-elegant">Alamat Email</label>
                    <div class="input-icon-wrapper">
                        <i class="fas fa-envelope input-icon"></i> {{-- Ikon Email (membutuhkan Font Awesome) --}}
                        <input type="email" class="form-control-elegant @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan alamat email Anda">
                    </div>
                    @error('email')
                        <div class="text-danger-elegant">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4 input-group-elegant">
                    <label for="password" class="form-label-elegant">Kata Sandi</label>
                    <div class="input-icon-wrapper">
                        <i class="fas fa-lock input-icon"></i> {{-- Ikon Kunci (membutuhkan Font Awesome) --}}
                        <input type="password" class="form-control-elegant @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Buat kata sandi Anda">
                    </div>
                    @error('password')
                        <div class="text-danger-elegant">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5 input-group-elegant">
                    <label for="password_confirmation" class="form-label-elegant">Konfirmasi Kata Sandi</label>
                    <div class="input-icon-wrapper">
                        <i class="fas fa-key input-icon"></i> {{-- Ikon Kunci Konfirmasi (membutuhkan Font Awesome) --}}
                        <input type="password" class="form-control-elegant" id="password_confirmation" name="password_confirmation" required placeholder="Konfirmasi kata sandi Anda">
                    </div>
                </div>

                <div class="d-grid mb-4">
                    <button type="submit" class="btn-register-elegant">Daftar Akun</button>
                </div>

                <p class="text-center signup-text-elegant">
                    Sudah punya akun? <a href="{{ route('login') }}" class="login-link-elegant">Login di sini</a>
                </p>
            </form>
        </div>
    </div>
</div>

{{-- Tambahkan link Font Awesome di <head> layout Anda (layouts/app.blade.php) jika belum ada --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> --}}

{{-- CSS Styling --}}
<style>
    /* Import Poppins font */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #ffffff; /* Latar belakang putih polos */
        color: #333; /* Warna teks default abu gelap */
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; /* Pastikan mengambil tinggi viewport penuh */
        margin: 0;
        padding: 20px;
        box-sizing: border-box;
        overflow: auto; /* Agar bisa di-scroll jika konten terlalu panjang */
    }

    .register-page-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .register-card {
        position: relative;
        width: 100%;
        max-width: 520px; /* Ukuran kartu sedikit lebih besar untuk form registrasi */
        padding: 0; /* Padding akan diatur di body card dan header */
        border-radius: 25px; /* Border radius yang lebih besar dan elegan */
        background: rgba(255, 255, 255, 0.4); /* Background form transparan */
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(255, 255, 255, 0.5) inset; /* Shadow lebih dalam dan elegan dengan inset border */
        backdrop-filter: blur(20px); /* Efek blur glassmorphism yang lebih kuat */
        -webkit-backdrop-filter: blur(20px); /* Dukungan Webkit */
        border: 1px solid rgba(255, 255, 255, 0.3); /* Border lebih jelas namun tetap transparan */
        display: flex;
        flex-direction: column;
        align-items: center;
        overflow: hidden;
        animation: fadeIn 0.8s ease-out; /* Animasi masuk */
    }

    /* Animasi masuk */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .register-card-header {
        background: linear-gradient(135deg, #212529, #0a0a0a); /* Gradien hitam-abu gelap untuk header */
        color: #ffffff;
        border-top-left-radius: 24px; /* Cocokkan dengan border radius card */
        border-top-right-radius: 24px;
        padding: 30px; /* Padding lebih besar */
        text-align: center;
        font-size: 2.2rem; /* Ukuran font lebih besar */
        font-weight: 700;
        letter-spacing: 1.5px; /* Spasi antar huruf */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25); /* Shadow lebih kuat */
        width: 100%;
        box-sizing: border-box; /* Pastikan padding tidak menambah lebar */
    }

    .register-card-header h4 {
        margin: 0; /* Hilangkan margin default h4 */
        text-shadow: 1px 1px 3px rgba(0,0,0,0.2); /* Sedikit bayangan pada teks */
    }

    .register-card-body {
        padding: 2.5rem; /* Padding untuk body form */
        width: 100%;
        box-sizing: border-box;
    }

    .form-label-elegant {
        color: #495057; /* Abu gelap untuk label */
        font-weight: 600; /* Lebih tebal */
        margin-bottom: 0.6rem;
        display: block;
        font-size: 0.95rem;
    }

    .input-group-elegant {
        position: relative;
    }

    .input-icon-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #888; /* Warna ikon abu-abu */
        font-size: 1.1rem;
        z-index: 10;
    }

    .form-control-elegant {
        border: 1px solid #dee2e6; /* Border abu terang default */
        border-radius: 12px; /* Border radius lebih lembut */
        padding: 0.85rem 1.25rem 0.85rem 3.5rem; /* Padding input lebih besar dengan ruang untuk ikon */
        background-color: rgba(255, 255, 255, 0.8); /* Background input sedikit transparan */
        color: #212529;
        font-size: 1.05rem;
        transition: all 0.3s ease;
        width: 100%;
        box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
    }

    .form-control-elegant::placeholder {
        color: #aab8c2; /* Warna placeholder */
    }

    .form-control-elegant:focus {
        border-color: #007bff; /* Biru terang saat fokus */
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25), inset 0 1px 3px rgba(0,0,0,0.08);
        background-color: #ffffff;
        outline: none;
    }

    .form-control-elegant.is-invalid {
        border-color: #dc3545; /* Merah untuk invalid */
    }

    .text-danger-elegant {
        color: #dc3545; /* Warna merah untuk pesan error */
        font-size: 0.875rem;
        margin-top: 5px;
        display: block;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-color: #f5c6cb;
        border-radius: 12px; /* Border radius alert */
        font-size: 0.95rem;
        padding: 0.85rem 1.25rem;
    }

    .alert-danger ul {
        margin-bottom: 0;
        padding-left: 20px;
        list-style-type: disc;
    }

    .btn-register-elegant {
        background: linear-gradient(45deg, #007bff, #0056b3); /* Gradien biru untuk tombol */
        border: none;
        padding: 1rem;
        font-weight: 600;
        border-radius: 12px;
        transition: all 0.3s ease;
        letter-spacing: 1px;
        color: #ffffff;
        text-transform: uppercase;
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        cursor: pointer;
        width: 100%; /* Tombol mengambil lebar penuh */
    }

    .btn-register-elegant:hover {
        background: linear-gradient(45deg, #0056b3, #004085); /* Gradien lebih gelap saat hover */
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 123, 255, 0.4);
    }

    .btn-register-elegant:active {
        transform: translateY(0);
        box-shadow: 0 2px 10px rgba(0, 123, 255, 0.2);
    }

    .signup-text-elegant {
        color: #6c757d; /* Abu-abu untuk teks "Sudah punya akun?" */
        font-size: 0.95rem;
        margin-top: 1.5rem;
    }

    .login-link-elegant {
        color: #007bff; /* Biru terang untuk tautan */
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease, transform 0.2s ease;
        font-size: 0.95rem;
    }

    .login-link-elegant:hover {
        color: #0056b3; /* Biru lebih gelap saat hover */
        text-decoration: underline;
        transform: translateY(-1px);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        body {
            padding: 15px;
        }
        .register-card {
            margin: 1rem;
            border-radius: 20px;
            max-width: 95%;
        }
        .register-card-header {
            padding: 25px;
            font-size: 1.8rem;
            border-top-left-radius: 19px;
            border-top-right-radius: 19px;
        }
        .register-card-body {
            padding: 2rem;
        }
        .form-control-elegant {
            padding: 0.75rem 1rem 0.75rem 3rem;
        }
        .input-icon {
            left: 0.8rem;
            font-size: 1rem;
        }
        .btn-register-elegant {
            padding: 0.85rem;
            font-size: 0.95rem;
        }
    }

    @media (max-width: 480px) {
        .register-card-header {
            font-size: 1.5rem;
            padding: 20px;
        }
        .register-card-body {
            padding: 1.5rem;
        }
    }
</style>
@endsection