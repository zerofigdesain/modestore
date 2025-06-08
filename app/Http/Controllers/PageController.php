<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function produk()
    {
        return view('pages.produk');
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

    public function login()
    {
        return view('pages.login');
    }

    public function register()
    {
        return view('pages.register'); // Ini akan kita buat nanti jika dibutuhkan
    }
    public function aboutUs()
    {
        return view('pages.about_us');
    }
}