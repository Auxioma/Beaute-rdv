<?php

namespace App\Service;

final class PublicIdGenerator
{
    public function generate(int $length = 26): string
    {
        $bytes = max(1, (int) ceil($length / 2));

        return strtoupper(substr(bin2hex(random_bytes($bytes)), 0, $length));
    }
}
