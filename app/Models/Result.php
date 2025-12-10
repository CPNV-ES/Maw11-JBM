<?php

namespace Maw11Jbm\Models;

use core\Database;

class Result
{
    public static function all(): array
    {
        return Database::getInstance()->getAll('results');
    }

    public static function find(int $id): array
    {
        return Database::getInstance()->findById('results', $id);
    }

    public static function create(array $item): int
    {
        return Database::getInstance()->createItem('results', $item);
    }
}