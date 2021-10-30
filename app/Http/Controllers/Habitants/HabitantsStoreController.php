<?php

namespace App\Http\Controllers\Habitants;

use App\Http\Controllers\Controller;
use App\Models\Habitant;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HabitantsStoreController extends Controller
{
    public function store(Request $request)
    {
        $habitant = new Habitant();
        $habitant->name = $request->input('habitant_name');
        $habitant->age = Carbon::parse($request->input('habitant_birth'))->age;
        $habitant->document_type = $request->input('habitant_document_type');
        $habitant->document = $request->input('habitant_document_number');
        $habitant->occupation = $request->input('habitant_occupation');
        $habitant->kinship = $request->input('habitant_relationship');
        $habitant->user_id = intval($request->input('user_id'));
        $habitant->save();
        return redirect('/extrainfo/index/'.$habitant->user_id)->with('createHabitantSuccess', 'Habitante guardado');
    }
}
