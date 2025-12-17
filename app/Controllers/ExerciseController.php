<?php

namespace Maw11Jbm\Controllers;

use function core\view;

use Maw11Jbm\Models\Exercise;
use Maw11Jbm\Models\Field;
use Throwable;

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
            http_response_code(400);
            return view('errors/400.php', ['message' => 'Invalid exercise ID']);
        }

        try {
            $exercise = Exercise::find($exerciseId);
        } catch (Throwable $e) {
            http_response_code(404);
            return view('errors/404.php', ['message' => 'Exercise not found']);
        }

        return view('exercises/create.php', ['exercise' => Exercise::find($exerciseId)]);
    }

    public function indexTaking(): false|string
    {
        return view('exercises/index_take.php',['exercises' => Exercise::answering()]);
    }

    /**
     * @param array<string, int | string> $params
     */
    public function edit(array $params): false|string
    {
        $id = (int)$params['exerciseId'];

        try {
            Exercise::find($id);
        } catch (Throwable $e) {
            http_response_code(404);
            return view('errors/404.php', ['message' => 'Exercise not found.']);
        }

        return view('exercises/edit.php', ['exercises' => Exercise::allWithFields($id), 'allowedKinds' => Field::getAllowedKinds()]);
    }

    /**
     * @return false|string
     */
    public function create(): false|string
    {
        return view('exercises/create.php');
    }

    public function store(): false|string
    {
        if (!empty($_POST['exercise_title'])) {
            $id = Exercise::create([
                'title'  => $_POST['exercise_title'],
                'status' => 'building',
            ]);
            header('Location: /exercises/' . $id . '/fields');
            exit;
        }

        return view('exercises/create.php');
    }

    public function delete(array $params): false|string
    {
        $exerciseId = filter_var($params['id'], FILTER_VALIDATE_INT);

        if ($exerciseId === false) {
            http_response_code(400);
            return view('errors/400.php', ['message' => 'Invalid exercise ID']);
        }

        try {
            Exercise::delete($exerciseId);
        } catch (Throwable $e) {
            http_response_code(404);
            return view('errors/404.php', ['message' => 'Exercise not found']);
        }

        header('Location: /exercises');
        exit;
    }

    public function update(array $params): false|string
    {
        $exerciseId = filter_var($params['id'], FILTER_VALIDATE_INT);
        if ($exerciseId === false) {
            return 'Invalid exercise ID';
        }
        Exercise::edit($exerciseId);
        header('Location: /exercises');
        exit;
    }
}
