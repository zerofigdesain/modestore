@extends('layouts.app')

@section('title', 'Produk - Mitologi Clothing')

@section('content')
    <h2 class="mb-4 text-center section-title">Produk Kami</h2>
    <p class="text-center section-description">Lihat berbagai jenis produk konveksi yang kami tawarkan:</p>

    <div class="row">
        {{-- Produk Utama --}}
        <div class="col-md-4 mb-4">
            <div class="card produk-card">
                <img src="{{ asset('images/kaos.png') }}" class="card-img-top produk-image" alt="Kaos">
                <div class="card-body">
                    <h5 class="card-title produk-title">Kaos Custom</h5>
                    <p class="card-text produk-description">Buat kaos impian Anda dengan desain suka-suka.</p>
                    <a href="#" class="btn btn-primary produk-btn">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card produk-card">
                <img src="{{ asset('images/jaket.png') }}" class="card-img-top produk-image" alt="Jaket">
                <div class="card-body">
                    <h5 class="card-title produk-title">Jaket Komunitas</h5>
                    <p class="card-text produk-description">Desain jaket keren untuk komunitas atau event Anda.</p>
                    <a href="#" class="btn btn-primary produk-btn">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card produk-card">
                <img src="{{ asset('images/kemeja.png') }}" class="card-img-top produk-image" alt="Kemeja">
                <div class="card-body">
                    <h5 class="card-title produk-title">Kemeja Seragam</h5>
                    <p class="card-text produk-description">Kemeja berkualitas untuk seragam kantor atau acara formal.</p>
                    <a href="#" class="btn btn-primary produk-btn">Lihat Detail</a>
                </div>
            </div>
        </div>

        {{-- Produk Tambahan --}}
        <div class="col-md-4 mb-4">
            <div class="card produk-card">
                <img src="{{ asset('images/topi.png') }}" class="card-img-top produk-image" alt="Topi">
                <div class="card-body">
                    <h5 class="card-title produk-title">Topi Kustom</h5>
                    <p class="card-text produk-description">Lengkapi gaya Anda dengan topi desain sendiri.</p>
                    <a href="#" class="btn btn-primary produk-btn">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card produk-card">
                <img src="{{ asset('images/rompi.png') }}" class="card-img-top produk-image" alt="Rompi">
                <div class="card-body">
                    <h5 class="card-title produk-title">Rompi Safety/Outdoor</h5>
                    <p class="card-text produk-description">Rompi berkualitas untuk kebutuhan safety atau aktivitas outdoor.</p>
                    <a href="#" class="btn btn-primary produk-btn">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card produk-card">
                <img src="{{ asset('images/bajukomunitas.png') }}" class="card-img-top produk-image" alt="Baju Komunitas">
                <div class="card-body">
                    <h5 class="card-title produk-title">Baju Komunitas/Event</h5>
                    <p class="card-text produk-description">Seragam khusus untuk identitas komunitas atau acara Anda.</p>
                    <a href="#" class="btn btn-primary produk-btn">Lihat Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card produk-card">
                <img src="{{ asset('images/polo.png') }}" class="card-img-top produk-image" alt="Polo Shirt">
                <div class="card-body">
                    <h5 class="card-title produk-title">Polo Shirt Bordir</h5>
                    <p class="card-text produk-description">Polo shirt elegan untuk seragam atau acara semi-formal.</p>
                    <a href="#" class="btn btn-primary produk-btn">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card produk-card">
                <img src="{{ asset('images/hoodie.png') }}" class="card-img-top produk-image" alt="Hoodie">
                <div class="card-body">
                    <h5 class="card-title produk-title">Hoodie Custom</h5>
                    <p class="card-text produk-description">Buat hoodie hangat dan stylish dengan desain pilihan Anda.</p>
                    <a href="#" class="btn btn-primary produk-btn">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
@endsection