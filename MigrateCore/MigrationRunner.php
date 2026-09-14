<?php

namespace MigrateCore;

class MigrationRunner
{
    private \PDO $db;
    private string $migrationsPath;

    public function __construct(\PDO $db, string $migrationsPath)
    {
        $this->db = $db;
        $this->migrationsPath = $migrationsPath;
        $this->ensureMigrationsTable();
    }

    // ─── Public Commands ────────────────────────────────────────────────────────

    public function migrate(): void
    {
        $pending = $this->getPendingMigrations();

        if (empty($pending)) {
            $this->info('Nothing to migrate.');
            return;
        }

        $batch = $this->getNextBatch();

        foreach ($pending as $file) {
            $name = $this->filename($file);
            $this->line("  <yellow>Migrating:</yellow> {$name}");
            $start = microtime(true);

            $migration = $this->resolve($file);
            $migration->up();

            $elapsed = round((microtime(true) - $start) * 1000);
            $this->db->prepare("INSERT INTO migrations (migration, batch) VALUES (?, ?)")
                     ->execute([$name, $batch]);

            $this->line("  <green>Migrated:</green>  {$name} ({$elapsed}ms)");
        }
    }

    public function rollback(): void
    {
        $batch = $this->getLastBatch();

        if ($batch === 0) {
            $this->info('Nothing to rollback.');
            return;
        }

        $rows = $this->db->query("SELECT migration FROM migrations WHERE batch = {$batch} ORDER BY id DESC")
                         ->fetchAll(\PDO::FETCH_COLUMN);

        foreach ($rows as $name) {
            $file = $this->findFile($name);
            if (!$file) {
                $this->warn("  File not found for: {$name}, skipping.");
                continue;
            }

            $this->line("  <yellow>Rolling back:</yellow> {$name}");
            $start = microtime(true);

            $migration = $this->resolve($file);
            $migration->down();

            $elapsed = round((microtime(true) - $start) * 1000);
            $this->db->prepare("DELETE FROM migrations WHERE migration = ?")->execute([$name]);

            $this->line("  <green>Rolled back:</green>  {$name} ({$elapsed}ms)");
        }
    }

    public function reset(): void
    {
        $batches = $this->db->query("SELECT DISTINCT batch FROM migrations ORDER BY batch DESC")
                            ->fetchAll(\PDO::FETCH_COLUMN);

        if (empty($batches)) {
            $this->info('Nothing to reset.');
            return;
        }

        foreach ($batches as $batch) {
            $rows = $this->db->query("SELECT migration FROM migrations WHERE batch = {$batch} ORDER BY id DESC")
                             ->fetchAll(\PDO::FETCH_COLUMN);

            foreach ($rows as $name) {
                $file = $this->findFile($name);
                if (!$file) {
                    $this->warn("  File not found for: {$name}, skipping.");
                    continue;
                }

                $this->line("  <yellow>Rolling back:</yellow> {$name}");
                $migration = $this->resolve($file);
                $migration->down();
                $this->db->prepare("DELETE FROM migrations WHERE migration = ?")->execute([$name]);
                $this->line("  <green>Rolled back:</green>  {$name}");
            }
        }
    }

    public function fresh(): void
    {
        $this->info('Dropping all tables...');
        $this->db->exec("SET FOREIGN_KEY_CHECKS=0");
        $tables = $this->db->query("SHOW TABLES")->fetchAll(\PDO::FETCH_COLUMN);
        foreach ($tables as $table) {
            $this->db->exec("DROP TABLE IF EXISTS `{$table}`");
            $this->line("  <red>Dropped:</red> {$table}");
        }
        $this->db->exec("SET FOREIGN_KEY_CHECKS=1");
        $this->ensureMigrationsTable();
        $this->line('');
        $this->migrate();
    }

    public function status(): void
    {
        $ran = $this->getRanMigrations();
        $allFiles = $this->getAllFiles();

        if (empty($allFiles)) {
            $this->info('No migration files found.');
            return;
        }

        $this->line(str_pad('Migration', 55) . str_pad('Batch', 8) . 'Status');
        $this->line(str_repeat('-', 75));

        foreach ($allFiles as $file) {
            $name = $this->filename($file);
            if (isset($ran[$name])) {
                $status = "\033[32mRan\033[0m";
                $batch  = $ran[$name];
            } else {
                $status = "\033[33mPending\033[0m";
                $batch  = '-';
            }
            $this->line(str_pad($name, 55) . str_pad($batch, 8) . $status);
        }
    }

    public function make(string $name): void
    {
        $timestamp = date('Y_m_d_His');
        $snake     = $this->toSnakeCase($name);
        $filename  = "{$timestamp}_{$snake}.php";
        $className = $this->toPascalCase($name);

        $stub = <<<PHP
<?php

use MigrateCore\Migration;

class {$className} extends Migration
{
    public function up(): void
    {
        \$this->db->exec("
            CREATE TABLE IF NOT EXISTS `table_name` (
                `id` varchar(50) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        ");
    }

    public function down(): void
    {
        \$this->db->exec("DROP TABLE IF EXISTS `table_name`");
    }
}
PHP;

        $path = $this->migrationsPath . '/' . $filename;
        file_put_contents($path, $stub);
        $this->line("  <green>Created:</green> database/migrations/{$filename}");
    }

    // ─── Helpers ────────────────────────────────────────────────────────────────

    private function ensureMigrationsTable(): void
    {
        $this->db->exec("
            CREATE TABLE IF NOT EXISTS `migrations` (
                `id`        INT AUTO_INCREMENT PRIMARY KEY,
                `migration` VARCHAR(255) NOT NULL,
                `batch`     INT NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
        ");
    }

    private function getAllFiles(): array
    {
        $files = glob($this->migrationsPath . '/*.php');
        sort($files);
        return $files ?: [];
    }

    private function getRanMigrations(): array
    {
        $rows = $this->db->query("SELECT migration, batch FROM migrations ORDER BY id")
                         ->fetchAll(\PDO::FETCH_ASSOC);
        $map = [];
        foreach ($rows as $row) {
            $map[$row['migration']] = $row['batch'];
        }
        return $map;
    }

    private function getPendingMigrations(): array
    {
        $ran  = array_keys($this->getRanMigrations());
        $all  = $this->getAllFiles();
        return array_filter($all, fn($f) => !in_array($this->filename($f), $ran));
    }

    private function getNextBatch(): int
    {
        $last = $this->db->query("SELECT MAX(batch) FROM migrations")->fetchColumn();
        return ($last ?: 0) + 1;
    }

    private function getLastBatch(): int
    {
        return (int) $this->db->query("SELECT MAX(batch) FROM migrations")->fetchColumn();
    }

    private function filename(string $filePath): string
    {
        return pathinfo($filePath, PATHINFO_FILENAME);
    }

    private function findFile(string $name): ?string
    {
        $path = $this->migrationsPath . '/' . $name . '.php';
        return file_exists($path) ? $path : null;
    }

    private function resolve(string $file): Migration
    {
        require_once $file;
        // Derive class name from filename: 2024_01_01_000001_create_ms_role_table
        // → parts after the 4th underscore-delimited timestamp segment
        $filename  = $this->filename($file);
        $parts     = explode('_', $filename, 5); // [2024, 01, 01, 000001, create_ms_role_table]
        $classPart = $parts[4] ?? $filename;
        $className = $this->toPascalCase($classPart);
        return new $className($this->db);
    }

    private function toPascalCase(string $str): string
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $str)));
    }

    private function toSnakeCase(string $str): string
    {
        return strtolower(preg_replace('/[A-Z]/', '_$0', lcfirst($str)));
    }

    // ─── Output ─────────────────────────────────────────────────────────────────

    private function line(string $msg): void
    {
        $msg = preg_replace('/<green>(.*?)<\/green>/', "\033[32m$1\033[0m", $msg);
        $msg = preg_replace('/<yellow>(.*?)<\/yellow>/', "\033[33m$1\033[0m", $msg);
        $msg = preg_replace('/<red>(.*?)<\/red>/', "\033[31m$1\033[0m", $msg);
        echo $msg . PHP_EOL;
    }

    private function info(string $msg): void
    {
        echo "\033[36m{$msg}\033[0m" . PHP_EOL;
    }

    private function warn(string $msg): void
    {
        echo "\033[33m{$msg}\033[0m" . PHP_EOL;
    }
}
