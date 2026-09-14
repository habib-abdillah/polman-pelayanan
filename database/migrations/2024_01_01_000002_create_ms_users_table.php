<?php

use MigrateCore\Migration;

class CreateMsUsersTable extends Migration
{
    public function up(): void
    {
        $this->db->exec("
            CREATE TABLE IF NOT EXISTS `ms_users` (
                `id`           varchar(50)     NOT NULL,
                `nama_user`    varchar(50)     NOT NULL,
                `username`     varchar(50)     NOT NULL,
                `password`     varchar(200)    NOT NULL,
                `id_role`      varchar(50)     NOT NULL,
                `keterangan`   varchar(500)    NOT NULL,
                `status_aktif` enum('0','1','') NOT NULL,
                `user_id_buat` varchar(50)     NOT NULL,
                `user_id_ubah` varchar(50)     NOT NULL,
                `created_at`   date            NOT NULL,
                `updated_at`   date            NOT NULL,
                `timestamp`    timestamp       NOT NULL DEFAULT current_timestamp(),
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ");
    }

    public function down(): void
    {
        $this->db->exec("DROP TABLE IF EXISTS `ms_users`");
    }
}
