<?php

declare(strict_types=1);

namespace Core\Middlewares;

class Auth
{
    public function __construct(
        private \Core\Auth\Auth $auth,
    ) {
    }

    public function handle(): void
    {
        if ($this->auth->user() === null) {
            redirect('/auth');
        }
    }
}
