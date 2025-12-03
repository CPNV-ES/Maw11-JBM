<?php

use core\Router;
use Maw11Jbm\Controllers\ExerciseController;
use Maw11Jbm\Controllers\FieldController;
use Maw11Jbm\Controllers\HomeController;

/** @var Router $router */

$router->addRoute('GET', '/', [HomeController::class, 'index']);
$router->addRoute('GET', '/exercises', [ExerciseController::class, 'index']);
$router->addRoute('GET', '/exercises/answering', [ExerciseController::class, 'indexAnswering']);
$router->addRoute('GET', '/exercises/new', [ExerciseController::class, 'create']);
$router->addRoute('POST', '/exercises', [ExerciseController::class, 'store']);
$router->addRoute('GET', '/exercises/{id}', [ExerciseController::class, 'show']);
$router->addRoute('PUT', '/exercises/{id}', [ExerciseController::class, 'update']);
$router->addRoute('GET', '/exercises/{id}/fields', [ExerciseController::class, 'edit']);
$router->addRoute('GET', '/exercises/{exerciseId}/fields/{fieldId}/edit', [FieldController::class, 'edit']);
$router->addRoute('PATCH', '/exercises/{exerciseId}/fields/{fieldId}/edit', [FieldController::class, 'update']);
$router->addRoute('POST', '/exercises/{id}/fields', [FieldController::class, 'store']);
$router->addRoute('POST', '/exercises/{id}', [ExerciseController::class, 'delete']);