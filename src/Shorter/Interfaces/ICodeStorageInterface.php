<?php

namespace App\Shorter\Interfaces;

interface ICodeStorageInterface
{
    public function save(string $code, string $url): void;
    public function find(string $code): ?string;

}