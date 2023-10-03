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
        $user->name = 'superadmin';
        $user->phone = 12321312;
        $user->email = 'superadmin@gmail.com';
        $user->role = 'Superadmin';
        $user->password = bcrypt('superadmin');
        $user->save();

        $user->assignRole('Superadmin');
    }
}
