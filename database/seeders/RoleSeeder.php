<?php

use MigrateCore\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $today = date('Y-m-d');

        $this->insert('ms_role', [
            'id_role'      => 1,
            'kode_role'    => 'ADMIN',
            'nama_role'    => 'Administrator',
            'keterangan'   => 'Akses penuh ke seluruh fitur sistem',
            'status_aktif' => '1',
            'user_id_buat' => 'system',
            'user_id_ubah' => 'system',
            'tanggal_buat' => $today,
            'tanggal_ubah' => $today,
        ]);

        $this->insert('ms_role', [
            'id_role'      => 2,
            'kode_role'    => 'OPERATOR',
            'nama_role'    => 'Operator',
            'keterangan'   => 'Akses input transaksi dan data pelanggan',
            'status_aktif' => '1',
            'user_id_buat' => 'system',
            'user_id_ubah' => 'system',
            'tanggal_buat' => $today,
            'tanggal_ubah' => $today,
        ]);
    }
}
