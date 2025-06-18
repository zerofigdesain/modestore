<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use App\Models\Order;      // Import model Order
use App\Models\OrderItem;  // Import model OrderItem
use App\Models\Product;    // Import model Product untuk validasi harga

class CheckoutController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function showCheckoutForm()
    {
        return view('checkout');
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'cart_items' => 'required|array',
            'cart_items.*.id' => 'required',
            'cart_items.*.name' => 'required|string',
            'cart_items.*.price' => 'required|numeric|min:0', // Ini hanya harga dari klien, akan divalidasi ulang
            'cart_items.*.quantity' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        $cartItems = $request->input('cart_items');

        $totalAmount = 0;
        $itemDetails = [];

        // --- PENTING: VALIDASI DAN HITUNG ULANG TOTAL DI SISI SERVER (KEAMANAN!) ---
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem['id']);

            if (!$product) {
                // Jika produk tidak ditemukan di database, batalkan transaksi
                Log::error("Produk dengan ID " . $cartItem['id'] . " tidak ditemukan saat checkout.");
                return response()->json(['message' => 'Salah satu produk tidak valid.'], 400);
            }

            // Gunakan harga dari database, BUKAN dari klien
            $actualPrice = $product->price;

            $itemDetails[] = [
                'id' => (string)$product->id, // ID produk dari DB
                'price' => (int)$actualPrice, // Harga dari DB
                'quantity' => (int)$cartItem['quantity'], // Kuantitas dari klien
                'name' => $product->name, // Nama produk dari DB
            ];
            $totalAmount += $actualPrice * $cartItem['quantity'];
        }

        if ($totalAmount <= 0) {
            return response()->json(['message' => 'Total belanja tidak valid atau kosong.'], 400);
        }

        // Buat Order ID yang unik
        $orderId = 'ORDER-' . uniqid();

        // --- SIMPAN DETAIL PESANAN KE DATABASE SEBELUM MENDAPATKAN SNAP TOKEN ---
        // Status awal biasanya 'pending' atau 'waiting_payment'
        try {
            $order = Order::create([
                'user_id' => $user->id,
                'order_id' => $orderId,
                'total_amount' => $totalAmount,
                'status' => 'pending', // Status awal
                // 'payment_method' akan diisi setelah notifikasi callback
                // 'transaction_id' juga akan diisi setelah notifikasi callback
            ]);

            foreach ($itemDetails as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Error saving order to database: ' . $e->getMessage());
            return response()->json(['message' => 'Gagal menyimpan pesanan. Silakan coba lagi.'], 500);
        }

        // Konfigurasi parameter transaksi untuk Midtrans Snap
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $totalAmount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                // 'phone' => $user->phone, // Jika ada di model User
            ],
            'item_details' => $itemDetails,
            'callbacks' => [
                'finish' => route('order.success', ['order_id' => $orderId]),
                'error' => route('products.index'), // Arahkan ke halaman produk jika error
                'pending' => route('products.index'), // Arahkan ke halaman produk jika pending
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            Log::error('Midtrans Snap Token Error: ' . $e->getMessage());
            // Jika gagal mendapatkan Snap Token, hapus pesanan yang baru dibuat di DB
            if (isset($order)) {
                $order->delete(); // Hapus order utama
                // Order items akan otomatis terhapus karena onDelete('cascade') di migrasi
            }
            return response()->json(['message' => 'Gagal membuat token pembayaran. Silakan coba lagi.'], 500);
        }
    }

    // Menangani notifikasi callback dari Midtrans (webhook)
    public function handleMidtransCallback(Request $request)
    {
        $notif = new Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $orderId = $notif->order_id;
        $fraud = $notif->fraud_status;
        $transactionId = $notif->transaction_id; // Ambil transaction_id dari Midtrans

        Log::info("Midtrans Callback for Order ID: {$orderId}, Status: {$transaction}, Type: {$type}, Fraud: {$fraud}");

        // Temukan pesanan berdasarkan order_id yang Anda buat
        $order = Order::where('order_id', $orderId)->first();

        if (!$order) {
            Log::warning("Order ID not found in callback: {$orderId}");
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Update status pesanan di database
        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $order->update([
                        'status' => 'challenged',
                        'payment_method' => $type,
                        'transaction_id' => $transactionId
                    ]);
                    Log::info("Order {$orderId}: Challenged by FDS");
                } else {
                    $order->update([
                        'status' => 'paid',
                        'payment_method' => $type,
                        'transaction_id' => $transactionId
                    ]);
                    Log::info("Order {$orderId}: Success via Credit Card");
                }
            }
        } else if ($transaction == 'settlement') {
            $order->update([
                'status' => 'paid',
                'payment_method' => $type,
                'transaction_id' => $transactionId
            ]);
            Log::info("Order {$orderId}: Settled (Payment Success)");
        } else if ($transaction == 'pending') {
            $order->update([
                'status' => 'pending',
                'payment_method' => $type,
                'transaction_id' => $transactionId // Simpan meskipun pending
            ]);
            Log::info("Order {$orderId}: Pending payment");
        } else if ($transaction == 'deny') {
            $order->update([
                'status' => 'denied',
                'payment_method' => $type,
                'transaction_id' => $transactionId
            ]);
            Log::info("Order {$orderId}: Payment Denied");
        } else if ($transaction == 'expire') {
            $order->update([
                'status' => 'expired',
                'payment_method' => $type,
                'transaction_id' => $transactionId
            ]);
            Log::info("Order {$orderId}: Payment Expired");
        } else if ($transaction == 'cancel') {
            $order->update([
                'status' => 'canceled',
                'payment_method' => $type,
                'transaction_id' => $transactionId
            ]);
            Log::info("Order {$orderId}: Payment Cancelled");
        }

        return response()->json(['message' => 'Notification processed successfully'], 200);
    }
}