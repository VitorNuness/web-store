<?php

declare(strict_types=1);

use Core\Application;
use Core\Container\Container;

require __DIR__ . '/../vendor/autoload.php';

(new Application(
    Container::getInstance()
))->run();
