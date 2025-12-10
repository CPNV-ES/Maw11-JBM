<?php

namespace Maw11Jbm\Controllers;

use function core\view;

use Maw11Jbm\Models\Exercise;
use Maw11Jbm\Models\Field;

class FieldController
{
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
        $exercise = Exercise::find($params['exerciseId']);

        $field = Field::find($params['fieldId']);

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
