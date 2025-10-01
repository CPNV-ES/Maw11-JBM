<?php

use core\Router;
use Maw11Jbm\Controllers\ExerciseController;
use Maw11Jbm\Controllers\ExercisesController;
use Maw11Jbm\Controllers\HomePageController;

/** @var Router $router */

$router->addRoute('GET', '/', [HomePageController::class, 'index']);

$router->addRoute('GET', '/exercises', [ExercisesController::class, 'showAllExercises']);
$router->addRoute('GET', '/exercises/{id}', [ExerciseController::class, 'show']);
