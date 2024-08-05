<?php

declare(strict_types=1);

$db = container('db');

$products = $db
    ->query('SELECT * FROM products')
    ->get();

$title = 'My WebStore';
$heading = 'Home';

require resource_path('views/index.php');
