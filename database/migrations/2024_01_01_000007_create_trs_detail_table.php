<?php

use MigrateCore\Migration;

class CreateTrsDetailTable extends Migration
{
    public function up(): void
    {
        $this->db->exec("
            CREATE TABLE IF NOT EXISTS `trs_detail` (
                `id_transaksi`  varchar(100) NOT NULL,
                `id_pelayanan`  varchar(100) NOT NULL,
                `nama_pelayanan` varchar(100) NOT NULL,
                `harga`         varchar(100) NOT NULL,
                `qty`           varchar(100) NOT NULL,
                `subtotal`      varchar(100) DEFAULT NULL,
                `created_at`    date         NOT NULL,
                `updated_at`    date         NOT NULL,
                `timestamp`     timestamp    NULL DEFAULT current_timestamp(),
                KEY `id_transaksi` (`id_transaksi`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ");
    }

    public function down(): void
    {
        $this->db->exec("DROP TABLE IF EXISTS `trs_detail`");
    }
}
