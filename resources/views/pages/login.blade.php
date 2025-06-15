@extends('layouts.app')

@section('title', 'Login - Mitologi Clothing')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Login ke Akun Anda</h4>
                </div>
                <div class="card-body">
                    {{-- Form ini akan mengirim data POST ke rute 'login.authenticate' --}}
                    <form action="{{ route('login.authenticate') }}" method="POST">
                        @csrf {{-- Token CSRF untuk keamanan Laravel --}}

                        {{-- Menampilkan pesan sukses setelah pendaftaran --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Menampilkan error validasi dari controller (jika ada) --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            {{-- Gunakan old('email') untuk menjaga input email jika ada validasi gagal --}}
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            {{-- Menampilkan error spesifik untuk field email --}}
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            {{-- Menampilkan error spesifik untuk field password --}}
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember"> {{-- Tambahkan name="remember" --}}
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <p class="text-center mt-3">
                            Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
