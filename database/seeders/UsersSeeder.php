<?php

use MigrateCore\Seeder;

/**
 * Default users:
 *   admin    / admin123  (Administrator)
 *   operator / operator123 (Operator)
 *
 * Passwords are bcrypt hashed (cost 10) — same as the app uses password_hash().
 */
class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $today = date('Y-m-d');

        // Admin user — password: admin123
        $this->insert('ms_users', [
            'id'           => 'YVs16UFKkXbQy',
            'nama_user'    => 'Administrator',
            'username'     => 'admin',
            'password'     => password_hash('admin123', PASSWORD_BCRYPT),
            'id_role'      => '1',
            'keterangan'   => 'Default admin account',
            'status_aktif' => '1',
            'user_id_buat' => 'system',
            'user_id_ubah' => 'system',
            'created_at'   => $today,
            'updated_at'   => $today,
        ]);

        // Operator user — password: operator123
        $this->insert('ms_users', [
            'id'           => 'gjoGanWpDVIO6',
            'nama_user'    => 'Operator',
            'username'     => 'operator',
            'password'     => password_hash('operator123', PASSWORD_BCRYPT),
            'id_role'      => '2',
            'keterangan'   => 'Default operator account',
            'status_aktif' => '1',
            'user_id_buat' => 'system',
            'user_id_ubah' => 'system',
            'created_at'   => $today,
            'updated_at'   => $today,
        ]);
    }
}
