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

    static function getExercises() :array {
        return Database::getInstance()->getAll('exercises');
    }
}
