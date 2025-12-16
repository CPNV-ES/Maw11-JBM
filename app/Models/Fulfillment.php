<?php

namespace Maw11Jbm\Models;

use core\Database;

class Fulfillment
{
    public static function all(): array
    {
        return Database::getInstance()->getAll('fulfillments');
    }

    /**
     * @param array<string, mixed> $item
     */
    public static function create(array $item): int
    {
        return Database::getInstance()->createItem('fulfillments', $item);
    }

    /**
     * @param int $id
     * @param array<string, mixed> $data
     */
    public static function edit(int $id, array $data): void
    {
        Database::getInstance()->update('fulfillments',  $data, $id);
    }

}