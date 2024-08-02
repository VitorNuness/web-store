<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Models\Product;

$products = Product::all();

$filteredProducts = array_filter($products, static fn (array $products) => $products['is_available']);

$title = 'My WebStore';

require __DIR__ . '/../resources/views/index.phtml';
