@extends('layouts.app')

@section('title', 'Portofolio - Mitologi Clothing')

@section('content')
    <h2 class="mb-4">Portofolio Kami</h2>
    <p>Lihat beberapa hasil pekerjaan terbaik kami:</p>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/300x200?text=Proyek+1" class="card-img-top" alt="Proyek 1">
                <div class="card-body">
                    <h5 class="card-title">Seragam Kantor XYZ</h5>
                    <p class="card-text">Pembuatan seragam kemeja dan polo untuk perusahaan XYZ.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/300x200?text=Proyek+2" class="card-img-top" alt="Proyek 2">
                <div class="card-body">
                    <h5 class="card-title">Kaos Event Musik</h5>
                    <p class="card-text">Produksi kaos untuk event musik lokal di Indramayu.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/300x200?text=Proyek+3" class="card-img-top" alt="Proyek 3">
                <div class="card-body">
                    <h5 class="card-title">Jaket Angkatan Kampus</h5>
                    <p class="card-text">Jaket custom untuk angkatan mahasiswa universitas tertentu.</p>
                </div>
            </div>
        </div>
        </div>
@endsection