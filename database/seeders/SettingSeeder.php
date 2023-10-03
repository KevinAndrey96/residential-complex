<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting();
        $setting->name = 'reservadetoscana';
        $setting->num_tower = 20;
        $setting->num_int = 120;
        $setting->num_apt = 1200;
        $setting->logo = 'dsad';
        $setting->principal_color = '#23A711';
        $setting->second_color = '#424C40';
        $setting->third_color = '#306AAD';
        $setting->fourth_color = "#AD3630";
        $setting->glossary = 'Aliquam porttitor luctus lacinia. Cras bibendum luctus ante, eu rhoncus risus volutpat ac.
        Nulla eget felis eget mi molestie rutrum ac non elit.';
        $setting->save();








    }
}
