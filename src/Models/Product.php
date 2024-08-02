<?php

declare(strict_types=1);

namespace App\Models;

class Product
{
    public static function all(): array
    {
        return [
            [
                'name'         => 'XBox',
                'price'        => 500,
                'is_available' => true,
            ],
            [
                'name'         => 'PlayStation',
                'price'        => 600,
                'is_available' => true,
            ],
            [
                'name'         => 'Nintendo Switch',
                'price'        => 300,
                'is_available' => false,
            ],
        ];
    }
}
