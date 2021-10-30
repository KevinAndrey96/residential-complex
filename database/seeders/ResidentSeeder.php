<?php

namespace Database\Seeders;

use App\Models\Resident;
use App\Models\User;
use Illuminate\Database\Seeder;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Natalia';
        $user->phone = 123123;
        $user->email = 'natalia@natalia.com';
        $user->role = 'Resident';
        $user->password = bcrypt(123123);
        $user->save();
        $user = User::where('email', 'like',  'natalia@natalia.com')->first();
        $resident = new Resident();
        $resident->tower = 30;
        $resident->apt = 402;
        $resident->status = 'Habilitado';
        $resident->user_id = $user->id;
        $resident->save();
        $user->assignRole('Resident');

        $user = new User();
        $user->name = 'Andrea';
        $user->phone = 321321;
        $user->email = 'andrea@andrea.com';
        $user->role = 'Resident';
        $user->password = bcrypt(321321);
        $user->save();
        $user = User::where('email', 'like',  'andrea@andrea.com')->first();
        $resident = new Resident();
        $resident->tower = 74;
        $resident->apt = 300;
        $resident->status = 'Habilitado';
        $resident->user_id = $user->id;
        $resident->save();
        $user->assignRole('Resident');

        $user = new User();
        $user->name = 'Fabian';
        $user->phone = 654654;
        $user->email = 'fabian@fabian.com';
        $user->role = 'Resident';
        $user->password = bcrypt(654654);
        $user->save();
        $user = User::where('email', 'like',  'fabian@fabian.com')->first();
        $resident = new Resident();
        $resident->tower = 24;
        $resident->apt = 201;
        $resident->status = 'Habilitado';
        $resident->user_id = $user->id;
        $resident->save();
        $user->assignRole('Resident');

        $user = new User();
        $user->name = 'Carlos';
        $user->phone = 789789;
        $user->email = 'carlos@carlos.com';
        $user->role = 'Resident';
        $user->password = bcrypt(789789);
        $user->save();
        $user = User::where('email', 'like',  'carlos@carlos.com')->first();
        $resident = new Resident();
        $resident->tower = 32;
        $resident->apt = 604;
        $resident->status = 'Habilitado';
        $resident->user_id = $user->id;
        $resident->save();
        $user->assignRole('Resident');
    }
}
