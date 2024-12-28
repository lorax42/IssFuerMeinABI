<?php
$data = json_decode(file_get_contents('php://input'), true);

$name = $data['name'];
$price = $data['price'];

$csvFile = '../orders.csv';
$file = fopen($csvFile, 'a');
if (!$file) {
    die('Could not open file');
}

$data = array($name, $price);
fputcsv($file, $data);
fclose($file);

echo json_encode(array('message' => 'Order added successfully'));
?>
