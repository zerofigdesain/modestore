@extends('layouts.app')

@section('title', 'Produk - Mitologi Clothing')

@section('content')
    <h2 class="mb-4 text-center section-title">Produk Kami</h2>
    <p class="text-center section-description">Lihat berbagai jenis produk konveksi yang kami tawarkan:</p>

    <div class="row">
        {{-- Loop melalui setiap produk yang didapat dari database --}}
        @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card produk-card h-100"> {{-- Tambahkan h-100 untuk tinggi kartu yang seragam --}}
                    @if ($product->image)
                        {{-- Menggunakan asset() untuk gambar dari storage --}}
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top produk-image" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    @else
                        {{-- Gambar placeholder jika tidak ada gambar produk --}}
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top produk-image" alt="No Image" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column"> {{-- Flexbox untuk menempatkan tombol di bawah --}}
                        <h5 class="card-title produk-title">{{ $product->name }}</h5>
                        <p class="card-text produk-description">{{ Str::limit($product->description, 100) }}</p> {{-- Batasi deskripsi agar rapi --}}
                        {{-- Pastikan kolom 'price' di database sudah diubah ke BIGINT atau DECIMAL --}}
                        <p class="card-text"><strong>Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                        <div class="mt-auto"> {{-- Ini akan mendorong tombol ke bagian bawah kartu --}}
                            <a href="{{ url('/contact') }}" class="btn btn-primary produk-btn">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            {{-- Pesan ini akan muncul jika tidak ada produk di database --}}
            <div class="col-12">
                <div class="alert alert-info text-center" role="alert">
                    Maaf, belum ada produk yang tersedia saat ini.
                </div>
            </div>
        @endforelse
    </div>

    {{-- Jika Anda mengaktifkan paginasi di controller, uncomment bagian ini: --}}
    {{--
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
    --}}
@endsection