<?php

namespace App\Core\Infrastructure\Auth;

use App\Core\Domain\Auth\SessionRepositoryInterface;

class SessionRepository implements SessionRepositoryInterface
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function put(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function forget(string $key)
    {
        unset($_SESSION[$key]);
    }

    public function flush()
    {
        session_destroy();
    }
}
