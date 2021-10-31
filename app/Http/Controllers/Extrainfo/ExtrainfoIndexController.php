<?php

namespace App\Http\Controllers\Extrainfo;

use App\Http\Controllers\Controller;
use App\Models\Extra;
use App\Models\Habitant;
use App\Models\Pet;
use App\Models\Resident;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExtrainfoIndexController extends Controller
{
    public function index ($id)
    {
        $user = User::find($id);
        if($user->extrainfo == 1) {

            $residentData = Extra::where('user_id', '=', $id)->first();

             //return var_dump($residentData->themes);
            if ($residentData->themes !== null) {
                $themes = explode('/', $residentData->themes);
                for ($i = 0; $i < sizeof($themes); $i++) {
                    if ($themes[$i] == 'punishable_conduct') {
                        $themes[$i] = 'Conductas sancionables';
                    } else if ($themes[$i] == 'recycling') {
                        $themes[$i] = 'Reciclaje';
                    } else if ($themes[$i] == 'free_time') {
                        $themes[$i] = 'Manejo tiempo libre';
                    } else if ($themes[$i] == 'health') {
                        $themes[$i] = 'Salud';
                    } else if ($themes[$i] == 'health') {
                        $themes[$i] = 'Salud';
                    }
                }
            }

            $habitants = Habitant::where('user_id','=',$id)->get();
            $transports = Transport::where('user_id','=',$id)->get();
            $pets = Pet::where('user_id','=',$id)->get();

            return view('extrainfo.index', compact('residentData', 'themes', 'user', 'habitants', 'transports', 'pets'));
        }
        return redirect('/residents')->with('formNotFilled', 'Este residente no ha llenado el formato de actualización');
        }
}
