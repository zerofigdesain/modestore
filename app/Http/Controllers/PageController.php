<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Pastikan ini diimport
use App\Models\User; // Perlu untuk membuat user baru (jika belum ada)
use Illuminate\Support\Facades\Hash; // Perlu untuk mengenkripsi password
use Illuminate\Support\Facades\Auth; // Perlu untuk proses autentikasi

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function produk()
    {
        $products = Product::all();
        return view('pages.produk', compact('products'));
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function caraOrder()
    {
        return view('pages.cara_order');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function portofolio()
    {
        return view('pages.portofolio');
    }

    public function aboutUs()
    {
        return view('pages.about_us');
    }

    /**
     * Menampilkan formulir login.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('pages.login');
    }

    /**
     * Memproses percobaan login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        // 1. Validasi data yang masuk dari formulir
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Coba untuk mengautentikasi pengguna
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerasi session ID untuk keamanan

            // 3. Redirect pengguna setelah login berhasil
            return redirect()->intended('/')->with('success', 'Anda berhasil masuk!');
            // 'intended('/')' akan mengarahkan ke URL yang ingin diakses pengguna sebelumnya,
            // atau ke '/' jika tidak ada URL yang dimaksud.
        }

        // 4. Jika autentikasi gagal, kembali ke halaman login dengan error
        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ])->onlyInput('email'); // Hanya simpan input email agar password dikosongkan kembali
    }

    /**
     * Menampilkan formulir pendaftaran.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function register()
    {
        return view('pages.register');
    }

    /**
     * Memproses data pendaftaran dan membuat user baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeRegister(Request $request)
    {
        // 1. Validasi data yang masuk dari formulir
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Pastikan email unik
            'password' => 'required|string|min:8|confirmed', // Password minimal 8 karakter dan harus dikonfirmasi
        ]);

        // 2. Buat user baru di database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password sebelum disimpan!
        ]);

        // 3. (Opsional) Langsung login user setelah pendaftaran
        // Auth::login($user); // Aktifkan jika ingin langsung login

        // 4. Redirect user setelah pendaftaran berhasil
        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan masuk.');
    }
}
