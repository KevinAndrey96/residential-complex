<?php

namespace App\Http\Controllers\Extrainfo;

use App\Http\Controllers\Controller;
use App\Models\Extra;
use App\Models\Habitant;
use App\Models\Pet;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ExtrainfoStoreController extends Controller
{
    public function store(Request $request)
    {
        $extra = new Extra();
        $extra->name = $request->input('name');
        $extra->residenttype = $request->input('residenttype');
        $extra->document_type = $request->input('document_type');
        $extra->document = intval($request->input('document'));
        $extra->email = $request->input('email');
        $extra->phone = $request->input('phone');
        $extra->mobile = $request->input('mobile');

        $extra->livein = 1;
        if ($request->input('livein')  == 'false') {
            $extra->livein = 0;
        }

        $extra->job = $request->input('job');
        $extra->address = $request->input('address');

        $extra->lesseealert = 1;
        if ($request->input('lesseealert') == 'false') {
            $extra->lesseealert = 0;
        }

        $extra->depositnum = intval($request->input('depositnum'));
        $extra->cardnum = intval($request->input('cardnum'));
        $extra->dateadmission = $request->input('dateadmission');

        $extra->howcontribute = null;
        if ($request->input('howcontribute') != null) {
            $extra->howcontribute = $request->input('howcontribute');
        }
        $coexistence_issues = null;
        $themes = $request->input('themes');
        if(!is_null($themes)){
            $coexistence_issues = implode('/',$themes);
        }

        $extra->themes = $coexistence_issues;
        $extra->name_invoice = $request->input('name_invoice');
        $extra->phone_invoice = intval($request->input('phone_invoice'));
        $extra->address_invoice = $request->input('address_invoice');
        $extra->razon_realestate = $request->input('razon_realestate');
        $extra->nit_realestate = intval($request->input('nit_realestate'));
        $extra->name_realestate = $request->input('name_realestate');
        $extra->email_realestate = $request->input('email_realestate');
        $extra->phone_realestate = intval($request->input('phone_realestate'));
        $extra->user_id = Auth::user()->id;
        $extra->save();

        $habitant_name = $request->input('habitant_name');
        $habitant_birth = $request->input('habitant_birth');
        $habitant_documenttype = $request->input('habitant_document_type');
        $habitant_document = $request->input('habitant_document_number');
        $habitant_occupation = $request->input('habitant_occupation');
        $habitant_relationship = $request->input('habitant_relationship');

        for ($i = 0; $i < sizeof($habitant_name); $i++) {
            $habitant = new Habitant();
            $habitant->name = $habitant_name[$i];
            $habitant->age = Carbon::parse($habitant_birth[$i])->age;
            $habitant->document_type = $habitant_documenttype[$i];
            $habitant->document = $habitant_document[$i];
            $habitant->occupation = $habitant_occupation[$i];
            $habitant->kinship = $habitant_relationship[$i];
            $habitant->user_id = Auth::user()->id;
            $habitant->save();
        }

        $typeTransports = $request->input('type');
        $brand = $request->input('brand');
        $model = $request->input('model');
        $plaque = $request->input('plaque');
        $color = $request->input('color');
        $parkingnum = $request->input('parkingnum');
        $ownparking = $request->input('ownparking');
        $owner = $request->input('owner');
        $numserie = $request->input('numserie');
        $bicyclerack = $request->input('bicyclerack');
        $bicycleperiod = $request->input('bicycleperiod');


        if (isset($typeTransports)) {
            for($i = 0; $i < sizeof($typeTransports); $i++) {
                $transport = new Transport();
                $transport->brand = $brand[$i];
                $transport->model = $model[$i];
                $transport->plaque = $plaque[$i];
                $transport->type = $typeTransports[$i];
                $transport->color = $color[$i];
                $transport->parkingnum = $parkingnum[$i];
                $transport->ownparking = $ownparking[$i];
                /*
                if ($transport->ownparking == 'no') {
                    $transport->owner = $owner[$i];
                } else {
                    $transport->owner = null;
                }
                */
                $transport->numserie = $numserie[$i];
                $transport->bicyclerack = $bicyclerack[$i];
                $transport->bicycleperiod = intval($bicycleperiod[$i]);
                $transport->user_id = Auth::user()->id;

                $transport->save();
            }
        }


        $pet_name = $request->input('pet_name');
        $pet_race = $request->input('pet_race');
        $pet_color = $request->input('pet_color');
        $pet_age = $request->input('pet_age');
        $pet_policy = $request->input('pet_policy');
        $pet_species = $request->input('pet_species');


        if (isset($pet_name)) {
            for($i = 0; $i < sizeof($pet_name); $i++) {
                $pet = new Pet();
                $pet->name = $pet_name[$i];
                $pet->race = $pet_race[$i];
                $pet->color = $pet_color[$i];
                $pet->age = intval($pet_age[$i]);
                $pet->policy = $pet_policy[$i];
                $pet->species = $pet_species[$i];
                $pet->card = 1;
                if ($request->input('pet_card'.$i+1) == 'false') {
                    $pet->card = 0;
                }
                $pet->plaque = 1;
                if($request->input('pet_plaque'.$i+1) == 'false') {
                    $pet->plaque = 0;
                };
                $pet->dangerous = 1;
                if($request->input('pet_dangerous'.$i+1) == 'false') {
                    $pet->dangerous = 0;
                }
                $pet->user_id = Auth::user()->id;
                $pet->save();
            }
        }
        $user = User::find(Auth::user()->id);
        $user->extrainfo = true;
        $user->save();

        return view('home')->with('extraSuccess', 'Información registrada');

    }
}
