<?php

namespace Maw11Jbm\Models;

use core\Database;

class Exercise
{
    private string $id;
    private string $title;
    private string $status;

    public function __construct($title, $status)
    {
        $this->$title = $title;
        $this->$status = $status;
    }

    function getExercises(){
        $results = Database::getInstance()->getAll('exercises');
        return $results->fetchAll();
    }
}
