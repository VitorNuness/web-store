<?php

declare(strict_types=1);

namespace Core\Database;

use PDO;
use PDOException;

class Connector
{
    public function connect(): PDO
    {
        $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=pinguim_academy_webstore;charset=utf8mb4';
        return new PDO($dsn, 'root');
    }
}
