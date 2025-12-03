<?php

namespace Maw11Jbm\Controllers;

use Maw11Jbm\Models\Exercise;
use Maw11Jbm\Models\Field;
use Maw11Jbm\Models\Result;
use function core\view;

class ResultController
{

    public function create(array $params): false|string
    {
        $exerciseId = filter_var($params['id']);
        return view('results/create.php', [
            'exercise' => Exercise::allWithFields($exerciseId)
                ]);
    }
    public function store(): false|string
    {
        if (!empty($_POST['result'])) {
            Result::create([
                'result'   => $_POST['result'],
                'fields_id' => $_POST['fields_id'],
            ]);
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        }

        return view('results/create.php');
    }
}