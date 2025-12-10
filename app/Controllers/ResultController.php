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
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                if(str_starts_with($key, 'result')){
                    $fieldId = substr($key, strpos($key, "_") + 1);
                    Result::create([
                    'result'   => $value,
                    'fields_id' => $fieldId,
                ]);
                }
            }
            header('Location: ' . '/exercises/answering');
            exit;
        }

        return view('results/create.php');
    }
}