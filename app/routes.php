<?php

use core\Router;
use Maw11Jbm\Controllers\ExerciseController;
use Maw11Jbm\Controllers\HomeController;

/** @var Router $router */

$router->addRoute('GET', '/', [HomeController::class, 'index']);
$router->addRoute('GET', '/exercises', [ExerciseController::class, 'index']);
$router->addRoute('GET', '/exercises/answering', [ExerciseController::class, 'indexAnswering']);
$router->addRoute('GET', '/exercises/new', [ExerciseController::class, 'create']);
$router->addRoute('POST', '/exercises', [ExerciseController::class, 'store']);
$router->addRoute('GET', '/exercises/{id}', [ExerciseController::class, 'show']);