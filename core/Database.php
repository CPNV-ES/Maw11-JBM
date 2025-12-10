<?php

namespace core;

use Illuminate\Support\Collection;
use PDO;

class Database
{
    private static null|Database $instance = null;

    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO('sqlite:looper.db');
        $this->createTable('exercises', ['id INTEGER PRIMARY KEY AUTOINCREMENT', 'title TEXT NOT NULL', 'status TEXT NOT NULL']);
        $this->createTable('fields', ['id INTEGER PRIMARY KEY AUTOINCREMENT', 'label TEXT NOT NULL', 'value_kind INTEGER NOT NULL', 'exercises_id INTEGER NOT NULL', 'FOREIGN KEY("exercises_id") REFERENCES "exercises"("id")']);
        $this->createTable('results', ['id INTEGER PRIMARY KEY AUTOINCREMENT', 'result TEXT NOT NULL', 'exercises_id INTEGER NOT NULL','created_at DATETIME DEFAULT CURRENT_TIMESTAMP' ,'FOREIGN KEY("exercises_id") REFERENCES "exercises"("id")']);
        $this->createTable('fulfillments', ['id INTEGER PRIMARY KEY AUTOINCREMENT', 'answer TEXT NOT NULL', 'results_id INTEGER NOT NULL' ,'FOREIGN KEY("results_id") REFERENCES "results"("id")']);
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


    public function createItem($tablename, $item): int
    {
        foreach ($item as $key => $value) {
            $columns[] = $key;
            $values[] = "'$value'";
        }
        $columnsString = implode(", ", $columns);
        $valuesString = implode(", ", $values);
        $this->db->query("INSERT INTO $tablename ($columnsString) VALUES ($valuesString)");

        return (int)$this->db->lastInsertId();
    }


    function update($tableName, $item, $id)
    {
        $validColumns = $this->getTableColumns($tableName);
        $newValues = [];
        $params = [];
        foreach ($item as $key => $value) {
            if ($key !== '_method' && in_array($key, $validColumns)) {
                $newValues[] = "$key = ?";
                $params[] = $value;
            }
        }
        if (empty($newValues)) {
            return;
        }
        $columnsValues = implode(", ", $newValues);
        $params[] = $id;
        $stmt = $this->db->prepare("UPDATE $tableName SET $columnsValues WHERE id = ?");
        $stmt->execute($params);
    }

    private function getTableColumns($tableName)
    {
        $stmt = $this->db->query("PRAGMA table_info($tableName)");
        $columns = [];
        foreach ($stmt as $row) {
            $columns[] = $row['name'];
        }
        return $columns;
    }

    public function findById(string $tableName, int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM $tableName WHERE id = :id");
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function deleteItem($tableName, $id)
    {
        $stmt = $this->db->prepare("DELETE FROM $tableName WHERE id = :id");
        $stmt->execute([':id' => $id]);

    }

    function getAll($tableName, $column = null, $condition = null)
    {
        if ($column != null) {
            $stmt = $this->db->prepare("SELECT * FROM $tableName WHERE $column = ?");
            $stmt->execute([$condition]);
            return $stmt->fetchAll();
        } else {
            return $this->db->query("SELECT * FROM $tableName")->fetchAll();
        }
    }
    public function fetchAllWithJoins(string $baseTable, array $joins, ?string $where = null, array $params = [], string $columns = '*'): Collection
    {
        $sql = "SELECT {$columns} FROM {$baseTable}";

        foreach ($joins as $join) {
            $type = $join['type'] ?? 'INNER';
            $sql .= " {$type} JOIN {$join['table']} ON {$join['on']}";
        }

        if ($where) {
            $sql .= " WHERE {$where}";
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return collect($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    function getOne($tableName, $column, $condition)
    {
        $validColumns = $this->getTableColumns($tableName);
        if (!in_array($column, $validColumns)) {
            throw new \InvalidArgumentException("Invalid column name: $column");
        }
        $stmt = $this->db->prepare("SELECT * FROM $tableName WHERE $column = ?");
        $stmt->execute([$condition]);
        return $stmt->fetch();    }
}