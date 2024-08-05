<?php

declare(strict_types=1);

use Core\Database\Connector;

$db = container(Connector::class);

$products = $db
    ->query('SELECT * FROM products')
    ->get();

$title = 'My WebStore';
$heading = 'Home';

require resource_path('views/index.php');
