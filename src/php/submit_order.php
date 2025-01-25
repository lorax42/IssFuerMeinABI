<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $orders = $data['orders'] ?? [];
    $orderId = $data['order_id'] ?? 'N/A';
    $timestamp = date('Y-m-d H:i:s');

    // Define the CSV file
    $file = '../orders.csv';

    // Initialize the CSV file with headers if it doesn't exist
    if (!file_exists($file)) {
        $headers = ['Order ID', 'Item', 'Price', 'Quantity', 'Timestamp'];
        $handle = fopen($file, 'w');
        fputcsv($handle, $headers);
        fclose($handle);
    }

    // Append the order details to the CSV
    $handle = fopen($file, 'a');
    foreach ($orders as $order) {
        $row = [
            $orderId,
            $order['item'],
            $order['price'],
            $order['quantity'],
            $timestamp
        ];
        fputcsv($handle, $row);
    }
    fclose($handle);

    echo json_encode(['message' => 'Order submitted successfully!']);
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
}
?>
