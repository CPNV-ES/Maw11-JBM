<?php

namespace core;

use PDO;

class Database
{
    private static null|Database $instance = null;

    private PDO $db;

    function __construct()
    {
        $this->db = new PDO('sqlite:looper.db');
        $this->createTable('exercises',
            ['id INT PRIMARY KEY NOT NULL',
                'title TEXT NOT NULL',
                'status TEXT NOT NULL']);
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

    function createTable(string $tableName, array $columns)
    {
        $columnsSql = [];
        foreach ($columns as $index => $column) {
            $columnsSql[] = "$column";
        }
        $columnsString = implode(",\n", $columnsSql);
        $this->db->query("CREATE TABLE IF NOT EXISTS $tableName($columnsString)");
    }

    function createItem($tablename, $item)
    {
        foreach ($item as $key => $value) {
            $columns[] = $key;
            $values[] = "'$value'";
        }
        $columnsString = implode(", ", $columns);
        $valuesString = implode(", ", $values);
        $request = $this->db->prepare("INSERT INTO $tablename ($columnsString) VALUES ($valuesString)");
        $this->db->exec($request);
    }


    function editItem($tableName, $item, $id)
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