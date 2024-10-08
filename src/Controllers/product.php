<?php

declare(strict_types=1);

use Core\Database\Connector;

$db = container(Connector::class);

$product = $db
    ->query('SELECT * FROM products WHERE id = :id', ['id' => $_GET['id']])
    ->first();

$title = $product->name . ' | My WebStore';
$heading = 'Product Details';

require resource_path('views/product.php');
