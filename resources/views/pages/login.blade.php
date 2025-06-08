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
                    <form action="#" method="POST"> {{-- Nanti kita akan tambahkan route login yang sebenarnya --}}
                        @csrf {{-- Token CSRF untuk keamanan Laravel --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <p class="text-center mt-3">
                            Belum punya akun? <a href="{{ url('/register') }}">Daftar Sekarang</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection