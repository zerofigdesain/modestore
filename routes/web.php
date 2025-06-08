<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; // Tambahkan ini di bagian atas
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
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/register', [PageController::class, 'register'])->name('register'); // Tambahkan juga register
Route::resource('products', ProductController::class); // Ini akan membuat 7 route sekaligus
Route::get('/about-us', [PageController::class, 'aboutUs'])->name('about_us'); // Tambahkan ini
// Nanti akan ada route untuk CRUD dan Midtrans