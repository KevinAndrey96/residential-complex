<?php

namespace App\Http\Controllers\Habitants;

use App\Http\Controllers\Controller;
use App\Models\Habitant;
use Illuminate\Http\Request;

class HabitantsDeleteController extends Controller
{
    public function delete($id)
    {
        Habitant::destroy($id);
        return back()->with('deleteHabitantSuccess', 'Habitante eliminado');
    }
}
