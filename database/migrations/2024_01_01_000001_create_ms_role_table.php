<?php

use MigrateCore\Migration;

class CreateMsRoleTable extends Migration
{
    public function up(): void
    {
        $this->db->exec("
            CREATE TABLE IF NOT EXISTS `ms_role` (
                `id_role`     int(50)         NOT NULL,
                `kode_role`   varchar(50)     NOT NULL,
                `nama_role`   varchar(50)     NOT NULL,
                `keterangan`  varchar(500)    NOT NULL,
                `status_aktif` enum('0','1','') NOT NULL,
                `user_id_buat` varchar(50)    NOT NULL,
                `user_id_ubah` varchar(50)    NOT NULL,
                `tanggal_buat` date           NOT NULL,
                `tanggal_ubah` date           NOT NULL,
                `timestamp`   timestamp       NOT NULL DEFAULT current_timestamp(),
                PRIMARY KEY (`id_role`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ");
    }

    public function down(): void
    {
        $this->db->exec("DROP TABLE IF EXISTS `ms_role`");
    }
}
