<?php

declare(strict_types=1);

use Core\Database\Connector;

$title = 'My WebStore';
$heading = 'Home';

$pdo = (new Connector())->connect();

$statement = $pdo->prepare('SELECT * FROM products');
$statement->execute();

$products = $statement->fetchAll(\PDO::FETCH_OBJ);

require resource_path('views/index.php');
