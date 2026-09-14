<?php

use MigrateCore\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PelayananSeeder::class);
        $this->call(PelangganSeeder::class);
        $this->call(PembayaranSeeder::class);
    }
}
