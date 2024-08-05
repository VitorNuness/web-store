<?php

declare(strict_types=1);

return [
    'host'     => env('DB_HOST', '127.0.0.1'),
    'port'     => env('DB_PORT', 3306),
    'dbname'   => env('DB_NAME'),
    'charset'  => 'utf8mb4',
    'username' => env('db_USER', 'root'),
    'password' => env('DB_PASSWORD'),
];
