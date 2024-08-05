<?php

declare(strict_types=1);

namespace Core\Container;

use Psr\Container\ContainerInterface;

use function PHPSTORM_META\override;

class Container implements ContainerInterface
{
    private array $instances = [];

    private static ?self $instance = null;

    public function get(string $id)
    {
        if ($this->has($id)) {
            return $this->instances[$id];
        }

        throw new EntryNotFoundException("No entry was found for **[$id]** identifier.");
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->instances);
    }

    public function set(string $id, mixed $instance, bool $override = false): void
    {
        if ($this->has($id) && !$override) {
            return;
        }

        $this->instances[$id] = $instance;
    }

    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
