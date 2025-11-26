<?php

namespace Maw11Jbm\Models;

use core\Database;
use Illuminate\Support\Collection;

class Exercise
{
    private string $id;

    private string $title;

    private string $status;

    public function __construct(string $title, string $status)
    {
        $this->title  = $title;
        $this->status = $status;
    }

    public static function all(): array
    {
        return Database::getInstance()->getAll('exercises');
    }

    public static function allWithFields(int $id): array
    {
        $rows = Database::getInstance()->fetchAllWithJoins(
            'exercises e',
            [
                [
                    'type'  => 'LEFT',
                    'table' => 'fields f',
                    'on'    => 'f.exercises_id = e.id',
                ],
            ],
            'e.id = :id',
            ['id' => $id],
            'e.id AS exercise_id, e.title, e.status, f.id AS field_id, f.label, f.value_kind'
        );

        return self::mapExerciseWithFields($rows);
    }

    public static function create(array $item): int
    {
        return Database::getInstance()->createItem('exercises', $item);
    }

    public static function find(int $id): array
    {
        return Database::getInstance()->findById('exercises', $id);
    }

    public static function mapExerciseWithFields(Collection|array $rows): array
    {
        $rows = collect($rows);

        return $rows->isEmpty()
            ? []
            : [
                'id'     => $rows->first()['exercise_id'],
                'title'  => $rows->first()['title'],
                'status' => $rows->first()['status'],
                'fields' => $rows->whereNotNull('field_id')
                    ->map(fn ($r) => [
                        'id'         => $r['field_id'],
                        'label'      => $r['label'],
                        'value_kind' => $r['value_kind'],
                    ])->values()->all(),
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
