<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
        $user->password = bcrypt('cristian');
        $user->save();


    }
}
