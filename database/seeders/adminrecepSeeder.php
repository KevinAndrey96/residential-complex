<?php

namespace Database\Seeders;

use App\Models\Adminrecep;
use App\Models\User;
use Illuminate\Database\Seeder;

class adminrecepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'administrator';
        $user->phone = 3242343;
        $user->email = 'administrator@gmail.com';
        $user->role = 'Administrator';
        $user->password = bcrypt(3242343);
        $user->save();
        $adminrecep = new Adminrecep();
        $adminrecep->document = 2132332;
        $adminrecep->user_id = $user->id;
        $adminrecep->save();
        $user->assignRole('Administrator');

    }
}
