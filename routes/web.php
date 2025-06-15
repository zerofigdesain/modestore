<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; // Pastikan ini ada di bagian atas
use App\Http\Controllers\ProductController;

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

// Resource route untuk produk (ini akan membuat 7 rute CRUD untuk model Product)
Route::resource('products', ProductController::class);

// Nanti akan ada rute tambahan untuk CRUD lainnya dan integrasi Midtrans
