@extends('layouts.app')

@section('title', 'Cara Order - Mitologi Clothing')

@section('content')
    <h2 class="mb-4">Bagaimana Cara Order?</h2>
    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Pilih Produk & Desain</div>
                Tentukan jenis produk konveksi yang Anda inginkan (kaos, jaket, dll.) dan siapkan desain yang akan dicetak.
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Konsultasi & Penawaran</div>
                Hubungi kami melalui halaman <a href="{{ url('/contact') }}">Contact</a> untuk konsultasi desain, bahan, jumlah, dan kami akan memberikan penawaran harga terbaik.
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Konfirmasi Desain & Pembayaran DP</div>
                Setelah sepakat, konfirmasi desain akhir dan lakukan pembayaran uang muka (DP) sesuai kesepakatan.
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Proses Produksi</div>
                Pesanan Anda akan masuk ke tahap produksi setelah DP diterima. Kami akan menginformasikan progres pengerjaan.
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Pelunasan & Pengiriman/Pengambilan</div>
                Setelah produk selesai, lakukan pelunasan. Produk akan dikirim ke alamat Anda atau bisa diambil langsung ke tempat kami.
            </div>
        </li>
    </ol>

    <div class="alert alert-info mt-4" role="alert">
        Untuk pemesanan langsung ke tempat, silakan hubungi kami melalui kontak yang tersedia di halaman <a href="{{ url('/contact') }}">Contact</a>.
    </div>
@endsection