<?php
require_once __DIR__ . '/../../vendor/autoload.php'; // Pastikan path-nya benar dari folder public/api

// Konfigurasi Midtrans
\Midtrans\Config::$isProduction = false; // Ganti true jika sudah live
\Midtrans\Config::$serverKey = 'YOUR_MIDTRANS_SERVER_KEY'; // Ganti dengan Server Key asli Anda
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

header('Content-Type: application/json');

try {
    // Ambil notifikasi dari Midtrans
    $notif = new \Midtrans\Notification();

    $transaction = $notif->transaction_status;
    $type = $notif->payment_type;
    $order_id = $notif->order_id;
    $fraud = $notif->fraud_status;

    error_log("Midtrans notification received for order ID: $order_id - Status: $transaction");

    switch ($transaction) {
        case 'capture':
            if ($type === 'credit_card' && $fraud === 'challenge') {
                echo json_encode(['status' => 'challenge', 'order_id' => $order_id]);
            } else {
                echo json_encode(['status' => 'success', 'order_id' => $order_id]);
            }
            break;
        case 'settlement':
            echo json_encode(['status' => 'settlement', 'order_id' => $order_id]);
            break;
        case 'pending':
            echo json_encode(['status' => 'pending', 'order_id' => $order_id]);
            break;
        case 'deny':
            echo json_encode(['status' => 'deny', 'order_id' => $order_id]);
            break;
        case 'expire':
            echo json_encode(['status' => 'expire', 'order_id' => $order_id]);
            break;
        case 'cancel':
            echo json_encode(['status' => 'cancel', 'order_id' => $order_id]);
            break;
        default:
            echo json_encode(['status' => 'unknown', 'order_id' => $order_id]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
