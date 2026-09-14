<?php

use MigrateCore\Seeder;

class PelayananSeeder extends Seeder
{
    public function run(): void
    {
        $today = date('Y-m-d');
        $admin = 'YVs16UFKkXbQy';

        $pelayanan = [
            ['PLY001', 'Jasa Pembuatan Benda Kerja (Bubut)',        '150000', 'Pembuatan benda kerja dengan mesin bubut'],
            ['PLY002', 'Jasa Pembuatan Benda Kerja (Frais/Milling)', '175000', 'Pembuatan benda kerja dengan mesin frais'],
            ['PLY003', 'Jasa Pengujian Kekerasan Material',          '100000', 'Uji kekerasan menggunakan Rockwell/Vickers'],
            ['PLY004', 'Jasa Pengelasan (Welding)',                  '200000', 'Layanan pengelasan SMAW/MIG/TIG'],
            ['PLY005', 'Jasa Pengukuran & Kalibrasi',                '125000', 'Kalibrasi alat ukur presisi'],
            ['PLY006', 'Jasa Pembuatan Cetakan (Mold)',              '500000', 'Pembuatan cetakan plastik dan logam'],
        ];

        foreach ($pelayanan as $i => [$kode, $nama, $harga, $ket]) {
            $id = 'PLY' . str_pad($i + 1, 4, '0', STR_PAD_LEFT);
            $this->insert('ms_pelayanan', [
                'id'             => $id,
                'kode_pelayanan' => $kode,
                'nama_pelayanan' => $nama,
                'harga'          => $harga,
                'keterangan'     => $ket,
                'status_aktif'   => '1',
                'user_id_buat'   => $admin,
                'user_id_ubah'   => $admin,
                'created_at'     => $today,
                'updated_at'     => $today,
            ]);
        }
    }
}
