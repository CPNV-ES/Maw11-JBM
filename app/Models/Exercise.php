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
        $this->$title  = $title;
        $this->$status = $status;
    }

    /**
     * @return array<int, Exercise> $params
     */
    public static function all() : array
    {
        return Database::getInstance()->getAll('exercises');
    }

    /**
     * @return array<int, Exercise> $params
     */
    public static function building(): array
    {
        return Database::getInstance()->getAll('exercises', 'status', 'building');
    }

    /**
     * @return array<int, Exercise> $params
     */
    public static function answering(): array
    {
        return Database::getInstance()->getAll('exercises', 'status', 'answering');
    }

    /**
     * @return array<int, Exercise> $params
     */
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
        Database::getInstance()->editItem('exercises',  $data, $id);
    }
    /**
     * @param int $id
     */
    public static function delete($id): void
    {
        Database::getInstance()->deleteItem('exercises', $id);
    }

    /**
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    public static function extractEditedAttributes($data): array
    {
        $extractedData = [];
       foreach($data as $key => $value) {
               if (property_exists(self::class, $key)) {
                   $extractedData[$key] = $value;
           }
       }
        return $extractedData;
    }
}
