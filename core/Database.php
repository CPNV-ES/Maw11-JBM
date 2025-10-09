<?php

namespace core;

use PDO;

class Database
{
    private PDO $db;

    function connect()
    {
        $this->db = new PDO('sqlite:looper.db');
        $this->createTable('exercises',
            ['ID INT PRIMARY KEY NOT NULL',
                'TITLE TEXT NOT NULL',
                'STATUS TEXT NOT NULL']);
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

    function getAll($tableName){
        return $this->db->query("SELECT * FROM $tableName");
    }
}