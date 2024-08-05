<?php

declare(strict_types=1);

$db = container('db');

$product = $db
    ->query('SELECT * FROM products WHERE id = :id', ['id' => $_GET['id']])
    ->first();

$title = $product->name . ' | My WebStore';
$heading = 'Product Details';

require resource_path('views/product.php');
