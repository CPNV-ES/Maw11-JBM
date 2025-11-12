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
        return view('exercises/show.php');
    }

    public function indexAnswering(): false|string
    {
        $data = Exercise::all();
        return view('exercises/index_answering.php', $data);
    }

    public function create(): false|string
    {
        return view('exercises/create.php');
    }

    public function store(): false|string
    {
        if (!empty($_POST["exercise_title"])) {
            $id = Exercise::create([
                'title' => $_POST["exercise_title"],
                'status' => 'building'
            ]);
            header('Location: /exercises/' . $id .'/fields');
            exit;
        }
        return view('exercises/create.php');
    }
    
    public function edit(array $params): false|string
    {
        $id = (int) $params['id'];
        $exercise = Exercise::find($id);

        if (!$exercise) {
            http_response_code(404);
            return 'Exercice introuvable';
        }

        return view('exercises/edit.php', ['exercise' => $exercise]);
    }
    public function update(): false|string
    {
        return view('exercises/edit.php');
    }
}
