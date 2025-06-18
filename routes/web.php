<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; // Pastikan ini ada di bagian atas
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\Auth\LoginController; // Tidak perlu jika semua di PageController
// use App\Http\Controllers\Auth\RegisterController; // Tidak perlu jika semua di PageController
use App\Http\Controllers\CheckoutController; // Perlu jika kamu sudah buat

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman-halaman statis
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/produk', [PageController::class, 'produk'])->name('produk');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/cara-order', [PageController::class, 'caraOrder'])->name('cara_order');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/portofolio', [PageController::class, 'portofolio'])->name('portofolio');
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about_us');

// Rute untuk menampilkan formulir login (GET)
Route::get('/login', [PageController::class, 'login'])->name('login');
// Rute untuk memproses login (POST)
Route::post('/login', [PageController::class, 'authenticate'])->name('login.authenticate');


// Rute untuk menampilkan formulir pendaftaran (GET)
Route::get('/register', [PageController::class, 'register'])->name('register');
// Rute untuk memproses data pendaftaran (POST)
Route::post('/register', [PageController::class, 'storeRegister'])->name('register.store');

// Rute untuk proses logout (POST request)
Route::post('/logout', [PageController::class, 'logout'])->name('logout');


// --- Rute yang membutuhkan autentikasi ---
// Wrap rute ini dalam middleware 'auth'
Route::middleware(['auth'])->group(function () {
    // Rute untuk menampilkan halaman profil pengguna
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');

    // Resource route untuk produk (ini adalah bagian admin, jadi sebaiknya diproteksi)
    Route::resource('products', ProductController::class);

    // --- Tambahan: Contoh Route untuk Checkout dan Midtrans ---
    // Jika ada CheckoutController, aktifkan ini
    // Route::get('/checkout/{product_id?}', [CheckoutController::class, 'index'])->name('checkout');
    // Route::post('/checkout/process-payment', [CheckoutController::class, 'processPayment'])->name('checkout.process');
    // Detail produk publik
Route::get('/produk/detail/{id}', [ProductController::class, 'showPublic'])->name('produk.detail');
// Tambah ke keranjang & checkout
Route::post('/keranjang/tambah', [ProductController::class, 'tambahKeranjang'])->name('keranjang.tambah');
Route::get('/keranjang', [ProductController::class, 'keranjang'])->name('keranjang');
Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');

});

// Route untuk notifikasi Midtrans (tidak perlu auth, karena diakses oleh Midtrans server)
// Contoh:
// Route::post('/midtrans/notification', [CheckoutController::class, 'notificationHandler'])->name('midtrans.notification');