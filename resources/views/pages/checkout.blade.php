@extends('layouts.app')

@section('content')
<style>
    /* Global Styles for a Clean Look */
    body {
        background-color: #F0F2F5; /* Light Gray Background */
        font-family: 'Poppins', sans-serif; /* Modern and clean font */
        color: #333; /* Darker text for readability */
    }

    /* Container Styling */
    .checkout-container {
        max-width: 700px;
        margin: 80px auto; /* Centered with top/bottom margin */
        background-color: #FFFFFF; /* Pure White Card */
        border-radius: 12px; /* Softly rounded corners */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); /* Subtle, elegant shadow */
        padding: 50px;
        text-align: center;
        position: relative; /* For the subtle background pattern */
        overflow: hidden; /* To contain the pattern */
    }

    /* Subtle Background Pattern (Optional but adds elegance) */
    .checkout-container::before {
        content: '';
        position: absolute;
        top: -50px;
        left: -50px;
        right: -50px;
        bottom: -50px;
        background: radial-gradient(circle at top left, rgba(0, 0, 0, 0.03) 1%, transparent 10%),
                    radial-gradient(circle at bottom right, rgba(0, 0, 0, 0.03) 1%, transparent 10%);
        opacity: 0.7;
        z-index: 0;
    }

    /* Header Styling */
    .checkout-header {
        font-size: 2.8em; /* Larger, more impactful heading */
        color: #0A192F; /* Deep Navy Blue */
        margin-bottom: 25px;
        font-weight: 700; /* Bolder for prominence */
        letter-spacing: -0.5px; /* Slightly tighter for a refined look */
    }

    /* Paragraph Styling */
    .checkout-message {
        font-size: 1.15em;
        color: #555; /* Slightly lighter gray for body text */
        line-height: 1.8; /* Better readability */
        margin-bottom: 40px;
        max-width: 500px; /* Limit width for better flow */
        margin-left: auto;
        margin-right: auto;
    }

    /* Button Styling */
    .btn-home {
        display: inline-block;
        padding: 16px 35px;
        background-color: #0A192F; /* Deep Navy Blue for primary action */
        color: #FFFFFF; /* White text */
        text-decoration: none;
        border-radius: 8px; /* Slightly rounded button */
        font-weight: 600;
        font-size: 1.05em;
        transition: all 0.3s ease; /* Smooth transition for hover effects */
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
        letter-spacing: 0.5px; /* Slight letter spacing */
    }

    .btn-home:hover {
        background-color: #1a335f; /* Slightly darker navy on hover */
        transform: translateY(-2px); /* Slight lift on hover */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25); /* Enhanced shadow on hover */
    }

    /* Optional: Icon for a touch of finesse */
    .success-icon {
        color: #28a745; /* A subtle green for success, or a soft blue #007bff */
        font-size: 6em; /* Large icon */
        margin-bottom: 25px;
        animation: fadeInScale 0.7s ease-out; /* Simple animation */
    }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

</style>

<div class="checkout-container">
    <div style="position: relative; z-index: 1;">
        {{-- Optional: Add a success icon if you have Font Awesome or similar --}}
        {{-- <i class="fas fa-check-circle success-icon"></i> --}}
        {{-- If you don't have Font Awesome, you can remove the above line or use an SVG --}}

        <h2 class="checkout-header">Checkout Berhasil!</h2>
        <p class="checkout-message">Terima kasih banyak telah berbelanja di toko kami! Pesanan Anda telah berhasil diproses dan akan segera kami siapkan.</p>
        <a href="{{ route('home') }}" class="btn-home">Kembali ke Beranda</a>
    </div>
</div>
@endsection