<?php
$products = json_decode(file_get_contents("products.json"), true);
// print_r($products);

// $grid = '<div class="grid-container">';
$grid = '';
foreach ($products as $product) {
    // $grid .= '<div class="product" data-name="' . $product["name"] . '" data-price="' . $product["price"] . '">';
    // $grid .= '<img src="' . $product["image"] . '" alt="' . $product["name"] . '">';
    // $grid .= '<h2>' . $product["name"] . '</h2>';
    // $grid .= '<p>Kostenbeteiligung: ' . $product["price"] . '€</p>';
    // $grid .= '</div>';
    $grid .= '<div class="item" data-item="' . $product["name"] . '" data-price="' . $product["price"] . '">';
    $grid .= '<label>' . $product["name"] . ' - ' . $product["price"] . '€</label>';
    $grid .= '<div class="content">';
    $grid .= '<img onclick="updateQuantity(this, 1)" src="' . $product["image"] . '">';
    $grid .= '<div class="buttons">';
    $grid .= '<button class="btn-l" onclick="updateQuantity(this, -1)">-</button>';
    $grid .= '<span class="quantity">0</span>';
    $grid .= '<button class="btn-r" onclick="updateQuantity(this, 1)">+</button>';
    $grid .= '</div>';
    $grid .= '</div>';
    $grid .= '</div>';
}
// $grid .= '</div>';
?>
