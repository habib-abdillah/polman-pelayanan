<?php

use MigrateCore\Seeder;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $today = date('Y-m-d');
        $admin = 'YVs16UFKkXbQy';

        $pembayaran = [
            ['PMB0001', 'Tunai',            'Pembayaran langsung secara tunai'],
            ['PMB0002', 'Transfer Bank',    'Transfer via rekening bank'],
            ['PMB0003', 'QRIS',             'Pembayaran via QRIS / scan QR'],
        ];

        foreach ($pembayaran as [$id, $jenis, $ket]) {
            $this->insert('ms_pembayaran', [
                'id'               => $id,
                'jenis_pembayaran' => $jenis,
                'status_aktif'     => '1',
                'keterangan'       => $ket,
                'user_id_buat'     => $admin,
                'user_id_ubah'     => $admin,
                'created_at'       => $today,
                'updated_at'       => $today,
            ]);
        }
    }
}
