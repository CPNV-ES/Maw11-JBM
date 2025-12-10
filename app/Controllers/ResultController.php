<?php

namespace Maw11Jbm\Controllers;

use Maw11Jbm\Models\Exercise;
use Maw11Jbm\Models\Fulfillment;
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
           $resultId = Result::create([
                'exercises_id' => $_POST['exercises_id'],
                    ]);
            foreach ($_POST as $key => $value) {
                if(str_starts_with($key, 'answer')){
                    $fieldId = substr($key, strpos($key, "_") + 1);
//                    var_dump('resultID ='.$resultId. 'fieldId'. $fieldId .'value'. $value);
//                    exit;
                    Fulfillment::create([
                        'answer' => $value,
                        'fields_id' => $fieldId,
                        'results_id' => $resultId
                    ]);
                }
            }
            header('Location: ' . '/exercises/answering');
            exit;
        }

        return view('results/create.php');
    }
}