<?php
require_once __DIR__ . '/../../vendor/autoload.php';

\Midtrans\Config::$serverKey = 'YOUR_MIDTRANS_SERVER_KEY';
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$is3ds = true;

header('Content-Type: application/json');

$response = ['snap_token' => null, 'message' => ''];

try {
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    if (!isset($data['cartItems'], $data['totalAmount'])) {
        throw new Exception("Invalid input data.");
    }

    $cartItems = $data['cartItems'];
    $totalAmount = $data['totalAmount'];

    $serverCalculatedTotal = 0;
    $item_details = [];

    foreach ($cartItems as $item) {
        $serverCalculatedTotal += $item['price'] * $item['quantity'];
        $item_details[] = [
            'id' => $item['id'],
            'price' => $item['price'],
            'quantity' => $item['quantity'],
            'name' => $item['name']
        ];
    }

    if ($serverCalculatedTotal !== $totalAmount) {
        error_log("Client total mismatch: Client={$totalAmount}, Server={$serverCalculatedTotal}");
        throw new Exception("Total mismatch. Transaksi dibatalkan.");
    }

    $order_id = 'ORDER-' . uniqid();

    $transaction_details = [
        'order_id' => $order_id,
        'gross_amount' => $totalAmount,
    ];

    $customer_details = [
        'first_name' => "Nama",
        'last_name' => "Pelanggan",
        'email' => "pelanggan@example.com",
        'phone' => "081234567890",
    ];

    $params = [
        'transaction_details' => $transaction_details,
        'customer_details' => $customer_details,
        'item_details' => $item_details,
    ];

    $snapToken = \Midtrans\Snap::getSnapToken($params);
    $response['snap_token'] = $snapToken;
    $response['message'] = 'Snap Token generated successfully.';
} catch (Exception $e) {
    http_response_code(500);
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
