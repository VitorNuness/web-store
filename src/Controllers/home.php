<?php

declare(strict_types=1);

use Core\Database\Connector;

$title = 'My WebStore';
$heading = 'Home';

$products = (new Connector())
    ->query('SELECT * FROM products')
    ->get();

require resource_path('views/index.php');
