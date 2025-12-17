<?php

namespace Maw11Jbm\Models;

use core\Database;
use Illuminate\Support\Collection;

class Result
{
    public static function all(): array
    {
        return Database::getInstance()->getAll('results');
    }

    public static function find(int $id): array
    {
        return Database::getInstance()->findById('results', $id);
    }

    public static function create(array $item): int
    {
        return Database::getInstance()->createItem('results', $item);
    }

    public static function allWithFulfillments(int $id): array
    {
        $rows = Database::getInstance()->fetchAllWithJoins(
            'results r',
            [
                [
                    'type'  => 'LEFT',
                    'table' => 'fulfillments f',
                    'on'    => 'f.results_id = r.id',
                ],
            ],
            'r.id = :id',
            ['id' => $id],
            'r.id AS result_id, f.id AS fulfillment_id, f.answer,f.fields_id, f.created_at'
        );
        return self::mapResultWithFulfillments($rows);
    }
    public static function mapResultWithFulfillments(Collection|array $rows): array
    {
        $rows = collect($rows);

        return $rows->isEmpty()
            ? []
            : [
                'id'     => $rows->first()['result_id'],
                'fulfillments' => $rows->whereNotNull('fulfillment_id')
                    ->map(fn ($r) => [
                        'id'         => $r['fulfillment_id'],
                        'answer'      => $r['answer'],
                        'created_at' => $r['created_at'],
                        'fields_id' => $r['fields_id'],
                    ])->values()->all(),
            ];
    }

    public static function findWithExerciseAndFulfillments(int $exerciseId, int $resultId): array
    {
        $rows = Database::getInstance()->fetchAllWithJoins(
            'results r',
            [
                [
                    'type'  => 'INNER',
                    'table' => 'exercises e',
                    'on'    => 'r.exercises_id = e.id',
                ],
                [
                    'type'  => 'LEFT',
                    'table' => 'fulfillments f',
                    'on'    => 'f.results_id = r.id',
                ],
                [
                    'type'  => 'LEFT',
                    'table' => 'fields fi',
                    'on'    => 'f.fields_id = fi.id',
                ],
            ],
            'r.id = :resultId AND e.id = :exerciseId',
            ['resultId' => $resultId, 'exerciseId' => $exerciseId],
            'e.title AS exercise_title, r.created_at AS result_date, f.id AS fulfillment_id, f.answer, fi.label AS field_label'
        );
        return self::mapResultWithExerciseAndFulfillments($rows);
    }

    private static function mapResultWithExerciseAndFulfillments(Collection|array $rows): array
    {
        $rows = collect($rows);

        if ($rows->isEmpty()) {
            return [];
        }

        $first = $rows->first();

        return [
            'exercise_title' => $first['exercise_title'],
            'result_date'    => $first['result_date'],
            'fulfillments'   => $rows->whereNotNull('fulfillment_id')->map(fn ($r) => [
                'answer'      => $r['answer'],
                'field_label' => $r['field_label'],
            ])->values()->all(),
        ];
    }
}