<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = "../orders.csv";

    $recent_orders = array_slice(
        file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES),
        -3
    );

    // return last 3 orders here
    echo json_encode(['message' => implode('<br>', $recent_orders)]);
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
}
?>
