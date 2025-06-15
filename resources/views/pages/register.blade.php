@extends('layouts.app')

@section('title', 'Register - Mitologi Clothing')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Daftar Akun Baru</h4>
                </div>
                <div class="card-body">
                    {{-- Form ini akan mengirim data POST ke rute 'register.store' --}}
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf {{-- Token CSRF untuk keamanan Laravel, sangat penting! --}}

                        {{-- Menampilkan semua error validasi secara umum (jika ada) --}}
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
                            <label for="name" class="form-label">Nama</label>
                            {{-- Gunakan old('name') untuk menjaga input nama jika ada validasi gagal --}}
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                            {{-- Menampilkan error spesifik untuk field 'name' --}}
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            {{-- Gunakan old('email') untuk menjaga input email jika ada validasi gagal --}}
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            {{-- Menampilkan error spesifik untuk field 'email' --}}
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            {{-- Menampilkan error spesifik untuk field 'password' --}}
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                        <p class="text-center mt-3">
                            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
