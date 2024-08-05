<?php

declare(strict_types=1);

namespace Core\Bootstrap;

use Core\Container\Container;
use Core\Database\Connector;

class StartDatabase
{
    public function __construct(
        private Container $container,
    ) {
    }

    public function handle()
    {
        $connection = $this->container->build(Connector::class);

        $this->container->set($connection);
    }
}
