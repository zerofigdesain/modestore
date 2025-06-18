@extends('layouts.app')

@section('title', 'Pesanan Berhasil! - Mitologi Clothing')

@section('content')
    <div class="container py-5 text-center">
        <h2 class="display-4 text-success">Pesanan Berhasil Dibuat!</h2>
        <p class="lead">Terima kasih telah berbelanja di Mitologi Clothing.</p>
        <p>Nomor Pesanan Anda: <strong>{{ request('order_id') ?? 'N/A' }}</strong></p>
        <p>Kami akan segera memproses pesanan Anda.</p>
        <hr>
        <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Lanjutkan Belanja</a>
        <a href="{{ url('/history-pesanan-anda') }}" class="btn btn-outline-secondary mt-3">Lihat Riwayat Pesanan</a>
    </div>
@endsection