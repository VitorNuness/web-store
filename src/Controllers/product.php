<?php

declare(strict_types=1);

use Core\Database\Connector;
use Core\Database\DatabaseConfig;

$db = new Connector(DatabaseConfig::getInstance());

$product = $db
    ->query('SELECT * FROM products WHERE id = 1')
    ->first();

$title = $product->name . ' | My WebStore';
$heading = 'Product Details';

require resource_path('views/product.php');
