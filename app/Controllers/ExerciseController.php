<?php

namespace Maw11Jbm\Controllers;

use function core\view;

class ExerciseController
{

    public function index(): false|string
    {
        return view('exercises/index.php');
    }
    
    public function show(array $params): false|string
    {
        $exerciseId = filter_var($params['id'], FILTER_VALIDATE_INT);
        if ($exerciseId === false) {
            return 'Invalid exercise ID';
        }

        return view('show.php');
    }

    public function indexAnswering(): false|string
    {
        return view('exercises/index_answering.php');
    }
}
