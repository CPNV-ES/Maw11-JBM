<?php

use core\Router;
use Maw11Jbm\Controllers\ExerciseController;
use Maw11Jbm\Controllers\FieldController;
use Maw11Jbm\Controllers\HomeController;
use Maw11Jbm\Controllers\ResultController;

/** @var Router $router */

$router->addRoute('GET', '/', [HomeController::class, 'index']);
$router->addRoute('GET', '/exercises', [ExerciseController::class, 'index']);
$router->addRoute('GET', '/exercises/answering', [ExerciseController::class, 'indexTaking']);
$router->addRoute('GET', '/exercises/new', [ExerciseController::class, 'create']);
$router->addRoute('GET', '/exercises/{id}/fulfillments/{resultId}/edit', [ResultController::class, 'edit']);
$router->addRoute('PUT', '/exercises/{id}/fulfillments/{resultId}/edit', [ResultController::class, 'update']);
$router->addRoute('POST', '/exercises', [ExerciseController::class, 'store']);
$router->addRoute('GET', '/exercises/{id}/fulfillments/new', [ResultController::class, 'create']);
$router->addRoute('GET', '/exercises/{id}', [ExerciseController::class, 'show']);
$router->addRoute('PATCH', '/exercises/{id}', [ExerciseController::class, 'update']);
$router->addRoute('GET', '/exercises/{id}/results', [ResultController::class, 'index']);
$router->addRoute('GET', '/exercises/{exerciseId}/fields/{fieldId}', [FieldController::class, 'edit']);
$router->addRoute('GET', '/exercises/{exerciseId}/fields', [ExerciseController::class, 'edit']);
$router->addRoute('PATCH', '/exercises/{exerciseId}/fields/{fieldId}/edit', [FieldController::class, 'update']);
$router->addRoute('POST', '/exercises/{id}/fields', [FieldController::class, 'store']);
$router->addRoute('POST', '/exercises/{id}', [ExerciseController::class, 'delete']);
$router->addRoute('POST', '/exercises/{id}/results', [ResultController::class, 'store']);
$router->addRoute('DELETE', '/exercises/{exerciseId}/fields/{fieldId}', [FieldController::class, 'delete']);
$router->addRoute('POST', '/exercises/{id}', [ExerciseController::class, 'delete']);
$router->addRoute('GET', '/exercises/{exerciseId}/results/{fieldId}', [FieldController::class, 'show']);
$router->addRoute('GET', '/exercises/{exerciseId}/fulfillments/{resultId}', [ResultController::class, 'show']);
