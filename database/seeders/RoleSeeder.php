<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Seeders de roles */
        Role::create(['name' => 'Superadmin']);
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Receptionist']);
        Role::create(['name' => 'Resident']);
        Role::create(['name' => 'Watchman']);
    }
}
