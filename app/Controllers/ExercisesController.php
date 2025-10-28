<?php

namespace Maw11Jbm\Controllers;

use function core\view;

class ExercisesController
{
    public function showAllExercises(): false|string
    {
        return view('index_answering.php');
    }
}
