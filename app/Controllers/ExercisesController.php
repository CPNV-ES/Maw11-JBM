<?php

namespace Maw11Jbm\Controllers;

use function core\view;

use Maw11Jbm\Models\Exercise;

class ExercisesController
{
    public function showAllExercises(): false|string
    {
        $data = Exercise::all();

        return view('exercises.php', $data);
    }
}
