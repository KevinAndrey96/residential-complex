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
    }
}
