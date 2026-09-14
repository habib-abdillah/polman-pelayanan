<?php

namespace MigrateCore;

class SeederRunner
{
    private \PDO $db;
    private string $seedersPath;

    public function __construct(\PDO $db, string $seedersPath)
    {
        $this->db          = $db;
        $this->seedersPath = $seedersPath;
    }

    public function run(?string $seederClass = null): void
    {
        // Load all seeder files so classes are available
        foreach (glob($this->seedersPath . '/*.php') as $file) {
            require_once $file;
        }

        $target = $seederClass ?? 'DatabaseSeeder';

        if (!class_exists($target)) {
            echo "\033[31mSeeder class [{$target}] not found.\033[0m" . PHP_EOL;
            return;
        }

        $this->runSeeder($target);
    }

    public function runSeeder(string $className): void
    {
        $start = microtime(true);
        echo "  \033[33mSeeding:\033[0m   {$className}" . PHP_EOL;

        /** @var Seeder $seeder */
        $seeder = new $className($this->db);
        $seeder->run();

        $elapsed = round((microtime(true) - $start) * 1000);
        echo "  \033[32mSeeded:\033[0m    {$className} ({$elapsed}ms)" . PHP_EOL;
    }
}
