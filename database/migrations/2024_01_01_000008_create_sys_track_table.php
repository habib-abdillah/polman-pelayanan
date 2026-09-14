<?php

use MigrateCore\Migration;

class CreateSysTrackTable extends Migration
{
    public function up(): void
    {
        $this->db->exec("
            CREATE TABLE IF NOT EXISTS `sys_track` (
                `id`               varchar(50)  NOT NULL,
                `username`         varchar(100) NOT NULL,
                `pc_name`          varchar(100) NOT NULL,
                `timestamp`        timestamp    NOT NULL DEFAULT current_timestamp(),
                `activity`         varchar(100) NOT NULL,
                `header_reference` varchar(50)  NOT NULL,
                `detail_reference` varchar(100) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ");
    }

    public function down(): void
    {
        $this->db->exec("DROP TABLE IF EXISTS `sys_track`");
    }
}
