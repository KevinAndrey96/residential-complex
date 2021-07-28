<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class superadmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'cristian';
        $user->phone = 12321312;
        $user->email = 'cristian@cristian.com';
        $user->role = 'Superadmin';
        $user->password = bcrypt('cristian');
        $user->save();

        /* Seeders de roles */
        Role::create(['name' => 'Superadmin']);
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Receptionist']);
        Role::create(['name' => 'Resident']);
        $superadmin = User::find(1);
        $superadmin->assignRole('Superadmin');










    }
}
