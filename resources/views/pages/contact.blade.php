@extends('layouts.app')

@section('title', 'Contact Us - Mitologi Clothing')

@section('content')
    <h2 class="mb-4">Hubungi Kami</h2>
    <p>Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau ingin berdiskusi mengenai proyek konveksi Anda.</p>

    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item">
                    <i class="bi bi-geo-alt-fill me-2"></i> <strong>Alamat:</strong> Jl. Contoh Indramayu No. 123, Indramayu, Jawa Barat
                </li>
                <li class="list-group-item">
                    <i class="bi bi-telephone-fill me-2"></i> <strong>Telepon:</strong> (0234) 123456
                </li>
                <li class="list-group-item">
                    <i class="bi bi-whatsapp me-2"></i> <strong>WhatsApp:</strong> +62 812-3456-7890
                </li>
                <li class="list-group-item">
                    <i class="bi bi-envelope-fill me-2"></i> <strong>Email:</strong> info@mitologiclothing.com
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="card mt-4 mt-md-0">
                <div class="card-body">
                    <h5 class="card-title">Kirim Pesan</h5>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Pesan</label>
                            <textarea class="form-control" id="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection