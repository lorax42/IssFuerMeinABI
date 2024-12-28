<?php
$products = json_decode(file_get_contents("products.json"), true);
// print_r($products);

// $grid = '<div class="grid-container">';
$grid = '';
foreach ($products as $product) {
    $grid .= '<div class="product" data-name="' . $product["name"] . '" data-price="' . $product["price"] . '">';
    $grid .= '<img src="' . $product["image"] . '" alt="' . $product["name"] . '">';
    $grid .= '<h2>' . $product["name"] . '</h2>';
    $grid .= '<p>Kostenbeteiligung: ' . $product["price"] . '€</p>';
    $grid .= '</div>';
}
// $grid .= '</div>';
?>
