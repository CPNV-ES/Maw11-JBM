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
        $this->createTable('exercises',p
            ['ID INT PRIMARY KEY NOT NULL',
                'TITLE TEXT NOT NULL',
                'STATUS TEXT NOT NULL']);
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

    function createItem($item){
        return $this->db->query("INSERT INTO $tableName");
    }

    function getAll($tableName){
        return $this->db->query("SELECT * FROM $tableName");
    }
}