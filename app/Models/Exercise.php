<?php

namespace Maw11Jbm\Models;

use core\Database;

class Exercise
{
    private string $id;
    private string $title;
    private string $status;

    public function __construct(string $title, string $status)
    {
        $this->$title = $title;
        $this->$status = $status;
    }

    static function all() :array
    {
        return Database::getInstance()->getAll('exercises');
    }


    public static function building(): array
    {
        return Database::getInstance()->getAll('exercises', 'status', 'building');
    }

    public static function answering(): array
    {
        return Database::getInstance()->getAll('exercises', 'status', 'answering');
    }

    public static function closed(): array
    {
        return Database::getInstance()->getAll('exercises', 'status', 'closed');
    }

    public static function edit($id, $POST): void
    {
        Database::getInstance()->editItem('exercises',  $POST, $id);
    }
    public static function delete($id): void
    {
        Database::getInstance()->deleteItem('exercises', $id);
    }
}
