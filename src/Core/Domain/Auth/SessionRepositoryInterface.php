<?php 

namespace App\Core\Domain\Auth;

interface SessionRepositoryInterface
{
    public function get(string $key);
    public function put(string $key, $value);
    public function forget(string $key);
    public function flush();
}
