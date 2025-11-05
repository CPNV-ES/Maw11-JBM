<?php

namespace Maw11Jbm\Models;

use core\Database;

class Exercise
{
    private string $id;
    private string $title;
    private string $status;

    public function __construct(string $title, string $status)
    {
        $this->title = $title;
        $this->status = $status;
    }

    public static function getExercises() :array
    {
        return Database::getInstance()->getAll('exercises');
    }

    public static function create(array $item) : void
    {
        Database::getInstance()->createItem('exercises', $item);
    }

    public static function all(): array
    {
        return [
            ['id' => 1, 'title' => 'Exercise 1'],
            ['id' => 2, 'title' => 'Exercise 2'],
            ['id' => 3, 'title' => 'Exercise 3'],
            ['id' => 4, 'title' => 'Exercise 4'],
            ['id' => 5, 'title' => 'Exercise 5'],
            ['id' => 6, 'title' => 'Exercise 6'],
            ['id' => 7, 'title' => 'Exercise 7'],
            ['id' => 8, 'title' => 'Exercise 8'],
            ['id' => 9, 'title' => 'Exercise 9'],
            ['id' => 10, 'title' => 'Exercise 10'],
            ['id' => 11, 'title' => 'Exercise 11'],
        ];
    }

    public static function building(): array
    {
        return [
            ['id' => 1, 'title' => 'Exercise 1'],
            ['id' => 2, 'title' => 'Exercise 2'],
            ['id' => 3, 'title' => 'Exercise 3'],
        ];
    }

    public static function answering(): array
    {
        return [
            ['id' => 4, 'title' => 'Exercise 4'],
            ['id' => 5, 'title' => 'Exercise 5'],
            ['id' => 6, 'title' => 'Exercise 6'],
        ];
    }

    public static function closed(): array
    {
        return [
            ['id' => 7, 'title' => 'Exercise 7'],
            ['id' => 8, 'title' => 'Exercise 8'],
            ['id' => 9, 'title' => 'Exercise 9'],
            ['id' => 10, 'title' => 'Exercise 10'],
            ['id' => 11, 'title' => 'Exercise 11'],
        ];
    }
}
