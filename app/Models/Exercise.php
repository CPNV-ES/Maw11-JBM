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
