<?php

namespace App\Shorter;

use App\Shorter\Interfaces\ICodeStorageInterface;

class CodeFileStorage implements ICodeStorageInterface
{
    const CODE_FILE = __DIR__ . '/../../short_urls.txt';

    public function save(string $code, string $url): void
    {
        file_put_contents(self::CODE_FILE, "{$code} {$url}\n", FILE_APPEND);
    }

    public function find(string $code): ?string
    {
        $lines = file(self::CODE_FILE);
        foreach ($lines as $line) {
            list($savedCode, $url) = explode(' ', trim($line));
            if ($savedCode === $code) {
                return $url;
            }
        }

        return null;
    }
}