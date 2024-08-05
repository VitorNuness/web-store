<?php

declare(strict_types=1);

use Core\Database\Connector;
use Core\Database\DatabaseConfig;

$db = new Connector(DatabaseConfig::getInstance());

$products = $db
    ->query('SELECT * FROM products')
    ->get();

$title = 'My WebStore';
$heading = 'Home';

require resource_path('views/index.php');
