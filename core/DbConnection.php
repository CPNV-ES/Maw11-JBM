<?php

namespace core;

use SQLite3;

class DbConnection
{
    private SQLite3 $db;

    function connect()
    {
        $this->db = new SQLite3('looper.db');
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
}