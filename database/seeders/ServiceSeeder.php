<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new Service();

        $service->title = 'Piscina';
        $service->description = 'Piscina aclimatada';
        $service->capacity = 20;
        $service->strip = 60;
        $service->start = '08:00:00';
        $service->final = '19:00:00';
        $service->state = 1;
        $service->gallery = 'https://www.constructoracapital.com/web_datas/1582661762_Portoamericas_Apartamentos-en-Bogota_Avance-de-Obra-17.jpg';
        $service->monday = 1;
        $service->tuesday = 1;
        $service->wednesday = 1;
        $service->thursday= 1;
        $service->friday= 1;
        $service->saturday= 1;
        $service->sunday= 1;
        $service->save();

     $service1 = new Service();

        $service1->title = 'Gimnasio';
        $service1->description = 'Gimnasio para trabajar todas las partes de cuerpo	';
        $service1->capacity = 20;
        $service1->strip = '120';
        $service1->start = '09:00:00';
        $service1->final = '22:00:00';
        $service1->state = 1;
        $service1->gallery = 'https://www.constructoracapital.com/web_datas/1582661761_Portoamericas_Apartamentos-en-Bogota_Avance-de-Obra-13.jpg';
        $service1->monday = 0;
        $service1->tuesday = 1;
        $service1->wednesday = 1;
        $service1->thursday= 1;
        $service1->friday= 1;
        $service1->saturday= 1;
        $service1->sunday= 0;
        $service1->save();

        $service2 = new Service();
        $service2->title = 'Billar';
        $service2->description = 'Sala de billar para jugar libres, tres bandas y pool';
        $service2->capacity = 9;
        $service2->strip = '30';
        $service2->start = '10:00:00';
        $service2->final = '18:00:00';
        $service2->state = 1;
        $service2->gallery = 'https://0201.nccdn.net/4_2/000/000/050/773/billar-1140x854.jpg';
        $service2->monday = 0;
        $service2->tuesday = 0;
        $service2->wednesday = 0;
        $service2->thursday= 1;
        $service2->friday= 1;
        $service2->saturday= 1;
        $service2->sunday= 0;
        $service2->save();
    }



}
