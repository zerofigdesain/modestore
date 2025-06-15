<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import Model Product
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Penting untuk upload/hapus gambar

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * READ: Menampilkan daftar semua produk.
     */
    public function index()
    {
        // Ambil semua produk dari database, diurutkan dari yang terbaru, dan terapkan paginasi (10 produk per halaman)
        $products = Product::latest()->paginate(10);
        // Kirim data produk ke view 'products.index'
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * CREATE (Form): Menampilkan form untuk menambah produk baru.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     * CREATE (Store): Menyimpan data produk baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar: format & ukuran max 2MB
        ]);

        $imagePath = null;
        // Jika ada file gambar yang diupload
        if ($request->hasFile('image')) {
            // Simpan gambar ke storage/app/public/products dan dapatkan path-nya
            $imagePath = $request->file('image')->store('public/products');
            // Ganti 'public/' dengan string kosong agar path yang disimpan di DB relatif
            $imagePath = str_replace('public/', '', $imagePath);
        }

        // Buat entri produk baru di database
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath, // Simpan path gambar di kolom 'image'
        ]);

        // Redirect kembali ke halaman daftar produk dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     * READ (Detail): Menampilkan detail satu produk.
     */
    public function show(Product $product) // Route Model Binding: Laravel otomatis mencari produk berdasarkan ID
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     * UPDATE (Form): Menampilkan form untuk mengedit produk.
     */
    public function edit(Product $product) // Route Model Binding
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     * UPDATE (Store): Memperbarui data produk di database.
     */
    public function update(Request $request, Product $product) // Route Model Binding
    {
        // Validasi data yang masuk
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $product->image; // Pertahankan gambar lama secara default
        // Jika ada file gambar baru yang diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada dan bukan gambar default (misal: 'no_image.jpg')
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('public/products');
            $imagePath = str_replace('public/', '', $imagePath);
        }

        // Perbarui data produk di database
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath, // Simpan path gambar baru (atau tetap yang lama)
        ]);

        // Redirect kembali ke halaman daftar produk dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE: Menghapus produk dari database.
     */
    public function destroy(Product $product) // Route Model Binding
    {
        // Hapus gambar dari storage jika ada
        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        // Hapus produk dari database
        $product->delete();

        // Redirect kembali ke halaman daftar produk dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}