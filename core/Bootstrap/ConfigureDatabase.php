<?php

declare(strict_types=1);

namespace Core\Bootstrap;

use Core\Container\Container;
use Core\Database\DatabaseConfig;

class ConfigureDatabase
{
    public function __construct(
        private Container $container
    ) {
    }

    public function handle()
    {
        $this->container->set('db.config', new DatabaseConfig());
    }
}
