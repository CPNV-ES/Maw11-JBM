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
    public function index(array $params): false|string {
        $exerciseId = filter_var($params['id']);
        return view('results/index.php', [
            'results' => Result::getResultByExerciseId($exerciseId)]);
    }

    public static function create(array $item): int
    {
        return Database::getInstance()->createItem('results', $item);
    }


    public static function getResultByExerciseId(int $exerciseId): array
    {
        $rows =  Database::getInstance()->fetchAllWithJoins(
            'exercises e',
            [
                [
                    'type'  => 'LEFT',
                    'table' => 'fields fi',
                    'on'    => 'fi.exercises_id = e.id',
                ],
                [
                    'type'  => 'LEFT',
                    'table' => 'results r',
                    'on'    => 'r.exercises_id = e.id',
                ],
                [
                    'type'  => 'LEFT',
                    'table' => 'fulfillments fu',
                    'on' => 'fu.fields_id = fi.id',
                    'and' => 'fu.results_id = r.id'
                ]
            ],
            'e.id = :id',
            ['id' => $exerciseId],
            'e.id AS exercise_id, e.title, 
            fi.id AS field_id,fi.label, fi.value_kind, 
            r.id AS results_id, r.created_at,
            fu.id AS fulfillment_id, fu.fields_id, fu.answer, fu.created_at,fu.updated_at',
        );

        return self::mapAllResultsOfExrcise($rows);
    }

    public static function mapAllResultsOfExrcise(Collection|array $rows): array
    {
        $rows = collect($rows);
        return $rows->isEmpty()
            ? []
            : [
                'id'     => $rows->first()['exercise_id'],
                'title'  => $rows->first()['title'],
                'fields' => $rows
                    ->whereNotNull('field_id')
                    ->unique('field_id')
                    ->map(fn ($r) => [
                        'id'         => $r['field_id'],
                        'label'      => $r['label'],
                        'value_kind' => $r['value_kind'],
                    ])->values()->all(),
                'results'=> $rows
                    ->whereNotNull('results_id')
                    ->unique('results_id')
                    ->map(fn ($res) => [
                        'id' => $res['results_id'],
                        'created_at' => $res['created_at'],
                        'fulfillments' => $rows
                            ->whereNotNull('fulfillment_id')
                            ->where('results_id', $res['results_id'])
                            ->unique('fulfillment_id')
                            ->map(fn ($f) => [
                                'id' => $f['fulfillment_id'],
                                'answer' => $f['answer'],
                                'fields_id' => $f['fields_id'],
                                'created_at' => $f['created_at'],
                            ])
                    ]),
            ];
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


}