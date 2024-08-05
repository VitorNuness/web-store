<?php

declare(strict_types=1);

use Core\Application;
use Core\Container\Container;

require __DIR__ . '/../vendor/autoload.php';

(new Application(
    Container::getInstance()
))->run();

$uri = $_SERVER['REQUEST_URI'];
$uri = parse_url($uri, PHP_URL_PATH);

$routes = [
    '/'        => 'home',
    '/product' => 'product',
    '/contact' => 'contact',
];

if (array_key_exists($uri, $routes)) {
    require base_path('src/Controllers/' . $routes[$uri] . '.php');
} else {
    abort();
}
