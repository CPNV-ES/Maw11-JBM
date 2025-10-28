<?php

namespace Maw11Jbm\Controllers;

use function core\view;

use Maw11Jbm\Models\Exercise;

class ExerciseController
{
    public function index(): false|string
    {
        return view('exercises/index.php', ['buildings' => Exercise::building(), 'closed' => Exercise::closed(), 'answerings' => Exercise::answering()]);
    }

    public function show(array $params): false|string
    {
        $exerciseId = filter_var($params['id'], FILTER_VALIDATE_INT);
        if ($exerciseId === false) {
            return 'Invalid exercise ID';
        }

        return view('exercise.php');
    }
}
