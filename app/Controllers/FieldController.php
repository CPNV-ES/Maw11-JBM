<?php

namespace Maw11Jbm\Controllers;

use Throwable;
use function core\view;

use Maw11Jbm\Models\Exercise;
use Maw11Jbm\Models\Field;

class FieldController
{
    public function show(array $params): false|string
    {
        try {
           $fieldExist = Field::find($params['fieldId']);
           $exerciseExist = Exercise::find($params['exerciseId']);
        } catch (Throwable $e) {
            http_response_code(404);
            return view('errors/404.php', ['message' => 'Field not found.']);
        }
        try {
            $exercise = Exercise::findWithFieldAndFulfillments($exerciseExist['id'], $fieldExist['id']);
        } catch (Throwable $e) {
            http_response_code(404);

            return view('errors/404.php', ['message' => 'Exercise not found.']);
        }
        return view('fields/show.php', ['exercise' => $exercise]);
    }

    public function store(): false|string
    {
        if (!empty($_POST['field_label'])) {
            Field::create([
                'label'        => $_POST['field_label'],
                'value_kind'   => $_POST['field_value_kind'],
                'exercises_id' => $_POST['exercises_id'],
            ]);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }

        return view('exercises/create.php');
    }

    public function edit(array $params): false|string
    {
        try {
            $exercise = Exercise::find($params['exerciseId']);
        } catch (Throwable $e) {
            http_response_code(404);

            return view('errors/404.php', ['message' => 'Exercise not found.']);
        }

        try {
            $field = Field::find($params['fieldId']);
        } catch (Throwable $e) {
            http_response_code(404);

            return view('errors/404.php', ['message' => 'Field not found.']);
        }


        return view('fields/edit.php', [
            'exercise'     => $exercise,
            'field'        => $field,
            'allowedKinds' => Field::getAllowedKinds(),
        ]);
    }

    public function update(): false|string
    {
        if (!empty($_POST['field_label'])) {

            Field::update(
                [
                    'label'        => $_POST['field_label'],
                    'value_kind'   => $_POST['field_value_kind'],
                ],
                $_POST['field_id']
            );

            header('Location: ' . '/exercises/' . $_POST['exercise_id'] . '/fields');
            exit;
        }

        return view('exercises/edit.php');
    }

    public function delete()
    {
        if (!empty($_POST['field_id'])) {

            Field::delete($_POST['field_id']);

            header('Location: ' . '/exercises/' . $_POST['exercise_id'] . '/fields');
            exit;
        }

        return view('exercises/edit.php');
    }
}
