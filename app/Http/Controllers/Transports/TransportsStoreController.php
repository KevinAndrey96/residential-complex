<?php

namespace App\Http\Controllers\Transports;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportsStoreController extends Controller
{
    public function store(Request $request)
    {
        $transport = new Transport();
        $transports = Transport::all();

        if ($request->input('type') == 'motorcycle' || $request->input('type') == 'car') {

            foreach ($transports as $transport) {
                if ($transport->parkingnum == $request->input('parkingnum')) {
                    return back()->with('addTransportFail','El número de parqueadero ya está en uso');
                }
            }

            $transport->color = $request->input('color');
            $transport->brand = $request->input('brand');
            $transport->plaque = $request->input('plaque');
            $transport->model = $request->input('model');
            $transport->parkingnum = $request->input('parkingnum');
            $transport->ownparking = $request->input('ownparking');
            $transport->owner = $request->input('owner');
            $transport->type = $request->input('type');
            $transport->user_id = $request->input('user_id');
            $transport->save();
            return redirect('extrainfo/index/'.$request->input('user_id'))->with('addTransportSuccess','El medio de transporte fue añadido');
        }

        if ($request->input('type') == 'bicycle') {

            foreach ($transports as $transport) {
                if ($transport->bicyclerack == $request->input('bicyclerack')) {
                    return back()->with('addBicycleTransportFail','El número de bicicletero ya está en uso');
                }
            }

            $transport->color = $request->input('color');
            $transport->numserie = $request->input('numserie');
            $transport->bicyclerack = $request->input('bicyclerack');
            $transport->bicycleperiod = $request->input('bicycleperiod');
            $transport->bicycleperiod = $request->input('bicycleperiod');
            $transport->user_id = $request->input('user_id');
            $transport->save();
            return redirect('extrainfo/index/'.$request->input('user_id'))->with('addTransportSuccess','El medio de transporte fue añadido');
        }
    }
}
