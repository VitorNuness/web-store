<?php

declare(strict_types=1);

use Core\Database\Connector;
use Core\Database\DatabaseConfig;

$db = new Connector(DatabaseConfig::getInstance());

$product = $db
    ->query('SELECT * FROM products WHERE id = :id', ['id' => $_GET['id']])
    ->first();

$title = $product->name . ' | My WebStore';
$heading = 'Product Details';

require resource_path('views/product.php');
