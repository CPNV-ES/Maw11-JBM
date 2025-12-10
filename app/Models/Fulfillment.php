<?php

namespace Maw11Jbm\Models;

use core\Database;

class Fulfillment
{
    public static function all(): array
    {
        return Database::getInstance()->getAll('fulfillments');
    }

    public static function create(array $item): int
    {
        return Database::getInstance()->createItem('fulfillments', $item);
    }

    public static function edit($id, $data): void
    {
        Database::getInstance()->update('fulfillments',  $data, $id);
    }

}