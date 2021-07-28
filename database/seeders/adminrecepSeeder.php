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
        $user->name = 'juan';
        $user->phone = 3242343;
        $user->email = 'juan@juan.com';
        $user->role = 'Administrator';
        $user->password = bcrypt('juan');
        $user->save();
        $user = User::where('email', 'like',  'juan@juan.com')->first();
        $adminrecep = new Adminrecep();
        $adminrecep->document = 2132332;
        $adminrecep->user_id = $user->id;
        $adminrecep->save();
        $user->assignRole('Administrator');

    }
}
