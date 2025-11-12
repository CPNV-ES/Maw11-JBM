<?php

namespace core;

use PDO;

class Database
{
    private static null|Database $instance = null;

    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('sqlite:looper.db');
        $this->createTable('exercises',
            ['id INTEGER PRIMARY KEY AUTOINCREMENT',
                'title TEXT NOT NULL',
                'status TEXT NOT NULL']);
        $this->createTable('fields',
            ['id INTEGER PRIMARY KEY AUTOINCREMENT',
                'label TEXT NOT NULL',
                'value_kind INTEGER NOT NULL',
                'exercises_id INTEGER NOT NULL',
                'FOREIGN KEY("exercises_id") REFERENCES "exercises"("id")']);
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getDb(): PDO
    {
        return $this->db;
    }

    public function update(string $tableName, array $item): void
    {
        $updates = array_filter($item, static function ($value) {
            return null !== $value;
        });
        
        $query = 'UPDATE '. $tableName. ' SET';
        $values = array();

        foreach ($updates as $name => $value) {
            $query .= ' '.$name.' = :'.$name.','; 
            $values[':'.$name] = $value; 
        }

        $query = substr($query, 0, -1).';';

        $stmt = $this->db->prepare($query);

        $stmt->execute($values);
    }

    public function createTable(string $tableName, array $columns): void
    {
        $columnsSql = [];
        foreach ($columns as $index => $column) {
            $columnsSql[] = (string)$column;
        }
        $columnsString = implode(",\n", $columnsSql);
        $this->db->query("CREATE TABLE IF NOT EXISTS $tableName($columnsString)");
    }

    public function createItem($tablename, $item): int
    {
        foreach($item as $key => $value){
            $columns[] = $key;
            $values[] = "'$value'";
        }
        $columnsString = implode(", ", $columns);
        $valuesString = implode(", ", $values);
        $this->db->query("INSERT INTO $tablename ($columnsString) VALUES ($valuesString)");
        return (int)$this->db->lastInsertId();
    }

    public function findById(string $tableName, int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM $tableName WHERE id = :id");
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll($tableName): array
    {
        return $this->db->query("SELECT * FROM $tableName")->fetchAll();
    }
}