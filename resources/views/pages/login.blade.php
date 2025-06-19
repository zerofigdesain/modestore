@extends('layouts.app')

@section('title', 'Login - Mitologi Clothing')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); position: relative;">
    <form action="{{ route('login.authenticate') }}" method="POST" class="w-100" style="max-width: 420px; padding: 2.5rem 2rem; border-radius: 16px; background-color: rgba(255, 255, 255, 0.5); box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
        @csrf

        <div class="text-center mb-4">
            <h2 class="text-dark fw-bold" style="font-size: 2rem;">MITOLOGI CLOTHING</h2>
            <p class="text-muted" style="font-size: 1rem;">Gerbang menuju koleksi eksklusif Anda</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="email" class="form-label text-dark">Alamat Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus style="border: 1px solid #0d6efd; border-radius: 8px;">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label text-dark">Kata Sandi</label>
            <input type="password" class="form-control" id="password" name="password" required style="border: 1px solid #0d6efd; border-radius: 8px;">
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label text-muted" for="remember">Ingat Saya</label>
            </div>
            <a href="#" class="text-decoration-none" style="font-size: 0.9rem; color: #0d6efd;">Lupa Kata Sandi?</a>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary" style="padding: 0.75rem; font-weight: 600; border-radius: 8px;">
                MASUK
            </button>
        </div>

        <p class="text-center text-muted mt-3 mb-0" style="font-size: 0.9rem;">
            Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none" style="color: #0d6efd;">Daftar Sekarang</a>
        </p>
    </form>
</div>

{{-- Optional styling for readability --}}
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #ffffff;
    }

    input.form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    button.btn-primary {
        background-color: #0d6efd;
        border: none;
        transition: background-color 0.3s ease;
    }

    button.btn-primary:hover {
        background-color: #0b5ed7;
    }

    .alert {
        border-radius: 8px;
    }
</style>
@endsection