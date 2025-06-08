@extends('layouts.app')

@section('title', 'FAQ - Mitologi Clothing')

@section('content')
    <h2 class="mb-4">Frequently Asked Questions (FAQ)</h2>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Bagaimana cara memesan produk di Mitologi Clothing?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Anda bisa melihat panduan lengkap cara order di halaman <a href="{{ url('/cara-order') }}">Cara Order</a> kami.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Apakah Mitologi Clothing melayani pengiriman ke seluruh Indonesia?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Ya, kami melayani pengiriman ke seluruh wilayah Indonesia melalui jasa ekspedisi terpercaya.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Berapa lama waktu pengerjaan pesanan?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Waktu pengerjaan bervariasi tergantung jenis produk, jumlah pesanan, dan tingkat kerumitan desain. Estimasi akan kami berikan setelah desain dan detail pesanan disepakati.
                </div>
            </div>
        </div>
        </div>
@endsection