<?php

use MigrateCore\Migration;

class CreateMsPelangganTable extends Migration
{
    public function up(): void
    {
        $this->db->exec("
            CREATE TABLE IF NOT EXISTS `ms_pelanggan` (
                `id`           varchar(50)  NOT NULL,
                `nama`         varchar(100) NOT NULL,
                `instansi`     varchar(100) NOT NULL,
                `keterangan`   varchar(100) NOT NULL,
                `status_aktif` varchar(100) NOT NULL,
                `user_id_buat` varchar(50)  NOT NULL,
                `user_id_ubah` varchar(50)  NOT NULL,
                `created_at`   date         NOT NULL,
                `updated_at`   date         NOT NULL,
                `timestamp`    timestamp    NOT NULL DEFAULT current_timestamp(),
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ");
    }

    public function down(): void
    {
        $this->db->exec("DROP TABLE IF EXISTS `ms_pelanggan`");
    }
}
