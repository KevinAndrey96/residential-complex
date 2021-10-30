<?php

namespace App\Http\Controllers\Pets;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetsDeleteController extends Controller
{
    public function delete($id)
    {
        Pet::destroy($id);
        return back()->with('deletePetSuccess', 'Mascota eliminada');
    }
}
