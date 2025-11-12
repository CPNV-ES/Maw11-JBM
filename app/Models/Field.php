<?php

namespace Maw11Jbm\Models;

use core\Database;

class Field
{
    public static function all() :array
    {
        return Database::getInstance()->getAll('fields');
    }

    public static function create(array $item): int
    {
        return Database::getInstance()->createItem('fields', $item);
    }
}