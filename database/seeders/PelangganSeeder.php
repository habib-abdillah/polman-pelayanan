<?php

use MigrateCore\Seeder;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        $today = date('Y-m-d');
        $admin = 'YVs16UFKkXbQy';

        $pelanggan = [
            ['PT. Maju Bersama',       'PT. Maju Bersama',       'Pelanggan reguler'],
            ['CV. Teknik Mandiri',      'CV. Teknik Mandiri',     'Pelanggan dari Bandung'],
            ['Universitas Widyatama',   'Universitas Widyatama',  'Institusi pendidikan'],
            ['Dinas PUPR Kota Bandung', 'Pemda Kota Bandung',     'Instansi pemerintah'],
            ['PT. Industri Logam Nusa', 'PT. Industri Logam Nusa','Pelanggan industri manufaktur'],
        ];

        foreach ($pelanggan as $i => [$nama, $instansi, $ket]) {
            $id = 'PLG' . str_pad($i + 1, 4, '0', STR_PAD_LEFT);
            $this->insert('ms_pelanggan', [
                'id'           => $id,
                'nama'         => $nama,
                'instansi'     => $instansi,
                'keterangan'   => $ket,
                'status_aktif' => '1',
                'user_id_buat' => $admin,
                'user_id_ubah' => $admin,
                'created_at'   => $today,
                'updated_at'   => $today,
            ]);
        }
    }
}
