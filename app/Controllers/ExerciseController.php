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

    /**
     * @param array<string, int | string> $params
     */
    public function show(array $params): false|string
    {
        $exerciseId = filter_var($params['id'], FILTER_VALIDATE_INT);
        if ($exerciseId === false) {
            return 'Invalid exercise ID';
        }

        return view('exercises/show.php');
    }

    public function indexAnswering(): false|string
    {
        $data = Exercise::all();

        return view('exercises/index_answering.php', $data);
    }

    /**
     * @param array<string, int | string> $params
     */
    public function edit(array $params): false | string
    {
        $exerciseId = filter_var($params['id'], FILTER_VALIDATE_INT);
        if ($exerciseId === false) {
            return 'Invalid exercise ID';
        }
        Exercise::edit($exerciseId, $_POST);
        header('Location: /exercises');
        exit;
    }

    /**
     * @param array<string, int | string> $params
     */
    public function delete(array $params): false | string
    {

        $exerciseId = filter_var($params['id'], FILTER_VALIDATE_INT);
        if ($exerciseId === false) {
            return 'Invalid exercise ID';
        }
        Exercise::delete($exerciseId);

        header('Location: /exercises');
        exit;
    }

}
