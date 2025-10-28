<?php

namespace Maw11Jbm\Controllers;

use core\Database;
use Maw11Jbm\Models\Exercise;
use function core\view;

class ExercisesController
{
    public function showAllExercises(): false|string
    {
        $data = Database::getInstance()->getAll('exercises');
        return view('exercises.php', $data);
    }
}
