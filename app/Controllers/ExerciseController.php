<?php

namespace Maw11Jbm\Controllers;

use function core\view;

class ExerciseController
{
    public function show(array $params): false|string
    {
        $exerciseId = filter_var($params['id'], FILTER_VALIDATE_INT);
        if ($exerciseId === false) {
            return 'Invalid exercise ID';
        }

        return view('exercise.php');
    }
}
