<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = "../orders.csv";

    if (!file_exists($file)) {
        echo json_encode(['message' => 'file not found']);
        return;
    }

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (count($lines) <= 1) {
        echo json_encode(['message' => 'no items in file']);
        return;
    }

    array_pop($lines);

    file_put_contents($file, implode(PHP_EOL, $lines) . PHP_EOL);
    echo json_encode(['message' => 'last item removed successfully']);
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
}
?>
