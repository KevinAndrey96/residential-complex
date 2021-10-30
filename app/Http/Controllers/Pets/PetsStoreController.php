<?php

namespace App\Http\Controllers\Pets;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetsStoreController extends Controller
{
    public function store(Request $request)
    {
        $pet = new Pet();
        $pet->name =  $request->input('pet_name');
        $pet->species =  $request->input('pet_species');
        $race = $request->input('pet_race');
        if (isset($race)) {
            $pet->race = $race;
        }
        $pet->color = $request->input('pet_color');
        $pet->age = $request->input('pet_age');
        $pet->policy = $request->input('pet_policy');
        $pet->dangerous = 0;
        if ($request->input('pet_dangerous') == 'true') {
            $pet->dangerous = 1;
        }
        $pet->card = 0;
        if ($request->input('pet_card') == 'true') {
            $pet->card = 1;
        }
        $pet->plaque = 0;
        if ($request->input('pet_plaque') == 'true') {
            $pet->plaque = 1;
        }
        $pet->user_id = $request->input('user_id');
        $pet->save();
        return redirect('extrainfo/index/'.$request->input('user_id'))->with('createPetSuccess', 'Mascota guardada');

    }
}
