@extends('layouts.app')

@section('title', 'Detail Produk - ' . $product->name)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Detail Produk: {{ $product->name }}</h2>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali ke Daftar Produk</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="img-fluid rounded" alt="No Image">
                    @endif
                </div>
                <div class="col-md-8">
                    <h3>{{ $product->name }}</h3>
                    <p class="lead"><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
                    <p><strong>Dibuat Pada:</strong> {{ $product->created_at->format('d M Y H:i') }}</p>
                    <p><strong>Terakhir Diperbarui:</strong> {{ $product->updated_at->format('d M Y H:i') }}</p>
                    <hr>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection