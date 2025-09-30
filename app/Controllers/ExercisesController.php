<?php

namespace Maw11Jbm\Controllers;

use core\view;

class ExercisesController
{
    public function showAllExercises(): false|string
    {
       return new View()->view('exercises.php');
    }

}
