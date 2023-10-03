<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(superadmin::class);
        $this->call(adminrecepSeeder::class);
        //$this->call(ServiceSeeder::class);
        $this->call(ResidentSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(WatchmanRoleSeeder::class);

    }
}
