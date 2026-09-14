<?php

use MigrateCore\Migration;

class CreateMsTransaksiTable extends Migration
{
    public function up(): void
    {
        $this->db->exec("
            CREATE TABLE IF NOT EXISTS `ms_transaksi` (
                `id_transaksi`      varchar(100) NOT NULL,
                `total`             varchar(100) DEFAULT NULL,
                `id_pelanggan`      varchar(100) NOT NULL,
                `id_admin`          varchar(100) NOT NULL,
                `metode_pembayaran` varchar(100) NOT NULL,
                `created_at`        date         NOT NULL,
                `updated_at`        date         NOT NULL,
                `timestamp`         timestamp    NOT NULL DEFAULT current_timestamp(),
                PRIMARY KEY (`id_transaksi`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ");
    }

    public function down(): void
    {
        $this->db->exec("DROP TABLE IF EXISTS `ms_transaksi`");
    }
}
