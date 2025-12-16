<?php

namespace Maw11Jbm\Models;

use core\Database;

class Field
{
    public static function all(): array
    {
        return Database::getInstance()->getAll('fields');
    }

    public static function create(array $item): int
    {
        return Database::getInstance()->createItem('fields', $item);
    }


    public static function find(int $id): array
    {
        return Database::getInstance()->findById('fields', $id);
    }

    public static function update(array $item, int $id): void
    {
        Database::getInstance()->update('fields', $item, $id);
    }

    public static function delete(int $id): void
    {
        Database::getInstance()->deleteItem('fields', $id);
    }

    public static function getAllowedKinds(): array
    {
        return ['Single line text', 'List of single lines', 'Multi-line text'];
    }
}
