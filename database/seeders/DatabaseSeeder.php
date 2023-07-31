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
        $this->call(superadmin::class);
        $this->call(adminrecepSeeder::class);
        //$this->call(ServiceSeeder::class);
        $this->call(ResidentSeeder::class);
    }
}
