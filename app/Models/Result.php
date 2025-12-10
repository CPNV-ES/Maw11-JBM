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

}