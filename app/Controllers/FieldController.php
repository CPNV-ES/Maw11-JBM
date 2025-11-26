<?php

namespace Maw11Jbm\Controllers;

use function core\view;

use Maw11Jbm\Models\Field;

class FieldController
{
    public function store(): false|string
    {
        if (!empty($_POST['field_label'])) {
            Field::create([
                'label'        => $_POST['field_label'],
                'value_kind'   => $_POST['field_value_kind'],
                'exercises_id' => $_POST['exercise_id'],
            ]);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }

        return view('exercises/create.php');
    }
}
