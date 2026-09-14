<?php

namespace MigrateCore;

abstract class Seeder
{
    protected \PDO $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    abstract public function run(): void;

    /**
     * Insert a single row into a table, skipping if PK already exists.
     */
    protected function insert(string $table, array $data): void
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $sql = "INSERT IGNORE INTO `{$table}` ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array_values($data));
    }

    /**
     * Call another seeder class by name.
     */
    protected function call(string $seederClass): void
    {
        /** @var Seeder $seeder */
        $seeder = new $seederClass($this->db);
        $seeder->run();
    }
}
