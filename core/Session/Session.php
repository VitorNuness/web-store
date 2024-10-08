<?php

declare(strict_types=1);

namespace Core\Session;

class Session
{
    public function __construct()
    {
        session_start();

        $this->agedSession();
    }

    public function put(string $key, mixed $value): self
    {
        $keys = explode('.', $key);
        $session = &$_SESSION;

        while (count($keys) > 1) {
            $key = array_shift($keys);

            if (!isset($session[$key]) || !is_array($session[$key])) {
                $session[$key] = [];
            }

            $session = &$session[$key];
        }

        $session[array_shift($keys)] = $value;

        return $this;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $keys = explode('.', $key);
        $session = $_SESSION;

        foreach ($keys as $key) {
            if (!isset($session[$key])) {
                return $default;
            }

            $session = $session[$key];
        }

        return $session;
    }

    public function flash(string $key, mixed $value): self
    {
        $this->put('_flash.new.' . $key, $value);

        return $this;
    }

    public function withErrors(array $errors): self
    {
        $this->flash('errors', $errors);

        return $this;
    }

    public function withInput(array $input): self
    {
        $input = (new PrepareDataForFlash($input))->handle();

        $this->flash('input', $input);

        return $this;
    }

    public function getError(string $key): ?string
    {
        return $this->getFlash('errors.' . $key . '.0');
    }

    public function getOldInput($key, mixed $default = null): mixed
    {
        return $this->getFlash('input.' . $key, $default);
    }

    public function getFlash(string $key, mixed $default = null): mixed
    {
        return $this->get('_flash.old.' . $key, $default);
    }

    private function agedSession()
    {
        $this->put('_flash.old', $this->get('_flash.new', []));
        $this->put('_flash.new', []);
    }

    public function forget(string $key): static
    {
        $keys = explode('.', $key);
        $session = &$_SESSION;

        while (count($keys) > 1) {
            $key = array_shift($keys);

            if (!isset($session[$key]) || !is_array($session[$key])) {
                $session[$key] = [];
            }

            $session = &$session[$key];
        }

        unset($session[array_shift($keys)]);

        return $this;
    }

    public function has(string $key): bool
    {
        return $this->get($key) !== null;
    }
}
