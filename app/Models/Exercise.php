<?php

namespace Maw11Jbm\Models;

use core\Database;
use Illuminate\Support\Collection;

class Exercise
{
    private string $title;

    private string $status;

    public function __construct(string $title, string $status)
    {
        $this->title  = $title;
        $this->status = $status;
    }

    /**
     * @return array<int, Exercise>
     */
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

    public static function findWithFieldAndFulfillments(int $exerciseId, int $fieldId): array
    {
        $rows = Database::getInstance()->fetchAllWithJoins(
            'exercises e',
            [
                [
                    'type'  => 'INNER',
                    'table' => 'fields f',
                    'on'    => 'f.exercises_id = e.id',
                ],
                [
                    'type'  => 'LEFT',
                    'table' => 'fulfillments ful',
                    'on'    => 'ful.fields_id = f.id',
                ],
            ],
            'e.id = :exerciseId AND f.id = :fieldId',
            ['exerciseId' => $exerciseId, 'fieldId' => $fieldId],
            'e.id AS exercise_id, e.title, e.status, f.id AS field_id, f.label, f.value_kind, ful.answer AS value, ful.results_id, ful.created_at'
        );
        return self::mapExerciseWithFieldAndFulfillments($rows);
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

    private static function mapExerciseWithFieldAndFulfillments(Collection|array $rows): array
    {
        $rows = collect($rows);

        if ($rows->isEmpty()) {
            return [];
        }

        $first = $rows->first();

        return [
            'id'     => $first['exercise_id'],
            'title'  => $first['title'],
            'status' => $first['status'],
            'field_id'  => $first['field_id'],
            'label'      => $first['label'],
            'value_kind' => $first['value_kind'],
            'answers'    => $rows->whereNotNull('value')
                ->map(fn ($r) => [
                    'value'      => $r['value'],
                    'created_at' => $r['created_at'] ?? null,
                    'results_id' => $r['results_id'],
                ])->values()->all(),
        ];
    }

    /**
     * @return array<int, Exercise>
     */
    public static function building(): array
    {
        return Database::getInstance()->getAll('exercises', 'status', 'building');
    }

    /**
     * @return array<int, Exercise>
     */
    public static function answering(): array
    {
        return Database::getInstance()->getAll('exercises', 'status', 'answering');
    }

    public static function closed(): array
    {
        return Database::getInstance()->getAll('exercises', 'status', 'closed');
    }

    /**
     * @param int $id
     */
    public static function edit($id): void
    {
        $data = self::extractEditedAttributes($_POST);
        Database::getInstance()->update('exercises', $data, $id);
    }

    /**
     * @param  array<string, mixed> $data
     * @return array<string, mixed>
     */
    public static function extractEditedAttributes($data): array
    {
        $extractedData = [];
        foreach ($data as $key => $value) {
            if (property_exists(self::class, $key)) {
                $extractedData[$key] = $value;
            }
        }

        return $extractedData;
    }

    /**
     * @param int $id
     */
    public static function delete($id): void
    {
        Database::getInstance()->deleteItem('exercises', $id);
    }
}
