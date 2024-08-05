<?php

declare(strict_types=1);

namespace Core\Container;

use Psr\Container\NotFoundExceptionInterface;
use RuntimeException;

class EntryNotFoundException extends RuntimeException implements NotFoundExceptionInterface
{
}
