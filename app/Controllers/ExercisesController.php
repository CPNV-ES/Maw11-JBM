<?php

namespace Maw11Jbm\Controllers;

use Maw11Jbm\Models\Exercise;
use function core\view;

class ExercisesController
{
    public function showAllExercises(): false|string
    {
        $data = Exercise::all();
        return view('exercises.php', $data);
    }
}
