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
            'exercise' => Exercise::findWithFields($exerciseId)
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
                    Fulfillment::create([
                        'answer' => $value,
                        'fields_id' => $fieldId,
                        'results_id' => $resultId
                    ]);
                }
            }
            header('Location: ' . '/exercises/'.$_POST['exercises_id'].'/fulfillments/'.$resultId.'/edit');
            exit;
        }

        return view('results/create.php');
    }

    public function edit(array $params): false|string
    {
        $exerciseId = (int) filter_var($params['id']);
        $resultId = (int) filter_var($params['resultId']);

        return view('results/edit.php', [
            'exercise' => Exercise::findWithFields($exerciseId),
            'result' => Result::allWithFulfillments($resultId)
        ]);
    }

    public function update(): false|string
    {
        foreach ($_POST as $key => $value) {
            if(str_starts_with($key, 'answer')){
                $fulfillmentId = substr($key, strpos($key, "_") + 1);
                Fulfillment::edit($fulfillmentId, [
                    'answer' => htmlspecialchars($value, ENT_QUOTES, 'UTF-8')
                ]);
            }
        }
        header('Location: '.$_SERVER['REQUEST_URI']);
        exit;
    }
}