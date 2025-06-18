@extends('layouts.app')

@section('title', 'Hubungi Kami - Mitologi Clothing')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="bg-gradient-to-r from-blue-800 to-gray-900 text-white py-5 mb-5 rounded-lg shadow-lg">
    <div class="container px-4">
        <div class="text-center">
            <h1 class="display-4 fw-bold mb-3" style="color: #FFFFFF;">Hubungi Kami</h1>
            <p class="lead" style="color: #E0E0E0;">Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau ingin berdiskusi mengenai proyek konveksi Anda.</p>
        </div>
    </div>
</div>

<div class="container px-4">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 h-100" style="background-color: #FFFFFF; border-radius: 12px;">
                <div class="card-header border-0 pb-0" style="background-color: #003366; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                    <h4 class="mb-0 py-3 d-flex align-items-center" style="color: #FFFFFF;">
                        <i class="bi bi-building me-3 fs-3"></i>
                        Informasi Perusahaan
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start p-3 rounded" style="background-color: #F8F9FA; border: 1px solid #E0E0E0;">
                                <div class="flex-shrink-0">
                                    <i class="bi bi-shop fs-4" style="color: #003366;"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fw-bold mb-1" style="color: #333333;">Nama Perusahaan</h6>
                                    <p class="mb-0" style="color: #555555;">MITOLOGI CLOTHING (MICLO)</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="d-flex align-items-start p-3 rounded" style="background-color: #F8F9FA; border: 1px solid #E0E0E0;">
                                <div class="flex-shrink-0">
                                    <i class="bi bi-briefcase-fill fs-4" style="color: #003366;"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fw-bold mb-1" style="color: #333333;">Bidang Perusahaan</h6>
                                    <p class="mb-0" style="color: #555555;">Vendor / Broker / Brand</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="d-flex align-items-start p-3 rounded" style="background-color: #F8F9FA; border: 1px solid #E0E0E0;">
                                <div class="flex-shrink-0">
                                    <i class="bi bi-geo-alt-fill fs-4" style="color: #003366;"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fw-bold mb-1" style="color: #333333;">Alamat</h6>
                                    <p class="mb-0" style="color: #555555;">Jl. By Pass Widasari Lama Blok Pasar Senggol RT 012/RW 006 Desa Leuwigede, Kec. Widasari, Kab. Indramayu</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="d-flex align-items-start p-3 rounded" style="background-color: #F8F9FA; border: 1px solid #E0E0E0;">
                                <div class="flex-shrink-0">
                                    <i class="bi bi-credit-card-fill fs-4" style="color: #003366;"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fw-bold mb-1" style="color: #333333;">NPWP</h6>
                                    <p class="mb-0" style="color: #555555;">99.149.537.5-437.000</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="d-flex align-items-start p-3 rounded" style="background-color: #F8F9FA; border: 1px solid #E0E0E0;">
                                <div class="flex-shrink-0">
                                    <i class="bi bi-hash fs-4" style="color: #003366;"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fw-bold mb-1" style="color: #333333;">NMID</h6>
                                    <p class="mb-0" style="color: #555555;">ID1024309638855</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card shadow-lg border-0 h-100" style="background-color: #FFFFFF; border-radius: 12px;">
                <div class="card-header border-0 pb-0" style="background-color: #003366; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                    <h4 class="mb-0 py-3 d-flex align-items-center" style="color: #FFFFFF;">
                        <i class="bi bi-envelope me-3 fs-3"></i>
                        Kirim Pesan
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold" style="color: #333333;">
                                <i class="bi bi-person me-2"></i>
                                Nama
                            </label>
                            <input type="text" class="form-control form-control-lg" id="name" placeholder="Masukkan nama Anda" required style="background-color: #F8F9FA; color: #333333; border: 1px solid #CCCCCC;">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold" style="color: #333333;">
                                <i class="bi bi-envelope me-2"></i>
                                Email
                            </label>
                            <input type="email" class="form-control form-control-lg" id="email" placeholder="nama@email.com" required style="background-color: #F8F9FA; color: #333333; border: 1px solid #CCCCCC;">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label fw-bold" style="color: #333333;">
                                <i class="bi bi-chat-text me-2"></i>
                                Pesan
                            </label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Tulis pesan Anda di sini..." required style="background-color: #F8F9FA; color: #333333; border: 1px solid #CCCCCC;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-lg w-100 fw-bold" style="background-color: #004d99; color: #FFFFFF; border: none; padding: 12px 20px; border-radius: 8px; transition: background-color 0.3s ease;">
                            <i class="bi bi-send me-2"></i>
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-lg border-0" style="background-color: #FFFFFF; border-radius: 12px;">
                <div class="card-header border-0 pb-0" style="background-color: #003366; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                    <h4 class="mb-0 py-3 d-flex align-items-center" style="color: #FFFFFF;">
                        <i class="bi bi-telephone me-3 fs-3"></i>
                        Kontak Langsung
                    </h4>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="text-center p-4 rounded hover-grow" style="background-color: #F8F9FA; border: 1px solid #E0E0E0;">
                                <i class="bi bi-telephone-fill fs-1 mb-3" style="color: #003366;"></i>
                                <h5 class="fw-bold" style="color: #333333;">Telepon</h5>
                                <p class="mb-2"><a href="tel:+6283122170902" class="text-decoration-none" style="color: #555555; transition: color 0.3s ease;">(+62) 831-2217-0902</a></p>
                                <small style="color: #888888;">Hubungi kami langsung</small>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="text-center p-4 rounded hover-grow" style="background-color: #F8F9FA; border: 1px solid #E0E0E0;">
                                <i class="bi bi-envelope-fill fs-1 mb-3" style="color: #003366;"></i>
                                <h5 class="fw-bold" style="color: #333333;">Email</h5>
                                <p class="mb-2"><a href="mailto:mitologiclothing@gmail.com" class="text-decoration-none" style="color: #555555; transition: color 0.3s ease;">mitologiclothing@gmail.com</a></p>
                                <small style="color: #888888;">Kirim email kepada kami</small>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="text-center p-4 rounded hover-grow" style="background-color: #F8F9FA; border: 1px solid #E0E0E0;">
                                <i class="bi bi-browser-chrome fs-1 mb-3" style="color: #003366;"></i>
                                <h5 class="fw-bold" style="color: #333333;">Website</h5>
                                <p class="mb-2"><a href="http://bit.ly/ordermiclo" target="_blank" class="text-decoration-none" style="color: #555555; transition: color 0.3s ease;">bit.ly/ordermiclo</a></p>
                                <small style="color: #888888;">Kunjungi website kami</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* General Body and Container */
body {
    background-color: #FFFFFF; /* Latar belakang putih */
    color: #333333; /* Warna teks utama abu-abu gelap */
}

.container {
    max-width: 1200px;
}

/* Hero Section */
.bg-gradient-to-r {
    /* Gradient biru dongker ke abu gelap untuk hero */
    background: linear-gradient(90deg, #003366 0%, #1a1a1a 100%);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); /* Shadow lebih ringan */
}

/* Cards */
.card {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* Shadow lebih ringan untuk card putih */
    border: 1px solid #E0E0E0; /* Border tipis untuk card putih */
}

.card-header {
    font-size: 1.5rem;
    font-weight: 600;
    padding: 1rem 1.5rem;
    border-bottom: none; /* Tanpa border bawah di header */
}

/* Specific Card Headers */
.card-header.bg-primary,
.card-header.bg-success,
.card-header.bg-info {
    background-color: #003366 !important; /* Biru dongker untuk semua header card */
    color: #FFFFFF !important;
}

/* Information Boxes (inside cards) */
.p-3.rounded {
    transition: all 0.3s ease;
    background-color: #F8F9FA; /* Latar belakang abu sangat terang */
    border: 1px solid #E0E0E0; /* Border abu terang */
}

.p-3.rounded:hover {
    background-color: #E9ECEF !important; /* Latar belakang sedikit gelap saat hover */
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Icons within information boxes */
.p-3.rounded .flex-shrink-0 i {
    color: #003366; /* Biru dongker untuk ikon */
}

/* Form Elements */
.form-control {
    border: 1px solid #CCCCCC !important; /* Border abu-abu untuk input */
    background-color: #F8F9FA !important; /* Latar belakang abu sangat terang untuk input */
    color: #333333 !important; /* Warna teks input abu gelap */
    padding: 12px 15px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.form-control::placeholder {
    color: #888888;
}

.form-control:focus {
    border-color: #007bff !important;
    box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25) !important;
    background-color: #FFFFFF !important; /* Putih pada fokus */
}

/* Buttons */
.btn-success {
    background-color: #004d99 !important; /* Biru dongker untuk tombol */
    border-color: #004d99 !important;
    font-weight: bold;
    padding: 12px 25px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn-success:hover {
    background-color: #003366 !important; /* Biru dongker lebih gelap saat hover */
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Contact Methods Section */
.hover-grow {
    transition: all 0.3s ease;
    cursor: pointer;
    background-color: #F8F9FA; /* Latar belakang abu sangat terang */
    border: 1px solid #E0E0E0; /* Border abu terang */
}

.hover-grow:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    background-color: #E9ECEF !important; /* Latar belakang sedikit gelap saat hover */
}

.hover-grow a {
    transition: color 0.3s ease;
}

.hover-grow a:hover {
    color: #003366 !important; /* Biru dongker pada link hover */
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .display-4 {
        font-size: 2.5rem;
    }
    
    .card-body {
        padding: 1.5rem;
    }
}
</style>
@endsection