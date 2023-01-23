<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Services\UpdateServiceUseCaseInterface;
use Illuminate\Http\Request;

class ServicesUpdateController extends Controller
{
    private UpdateServiceUseCaseInterface $updateServiceUseCase;

    public function __construct(UpdateServiceUseCaseInterface $updateServiceUseCase)
    {
        $this->updateServiceUseCase = $updateServiceUseCase;
    }

    public function update(Request $request)
    {
        try {
            /*
            $fields = [
                'title' => 'required|string',
                'capacity' => 'required',
                'strip' => 'required',
                'start' => 'required|string',
                'final' => 'required|string',
                'state' => 'required|string',
                'monday' => 'string',
                'tuesday' => 'string',
                'wednesday' => 'string',
                'thursday' => 'string',
                'friday' => 'string',
                'saturday' => 'string',
                'sunday' => 'string',
                'description' => 'required|string',
                'status' => 'required|string',
                'role' => 'required|string',
                'gallery.*' => 'mimes:jpeg,jpg,png'
            ];

            $message = [
                'required' => ':attribute es requerido',
            ];
            $this->validate($request, $fields, $message);
            */
            $this->updateServiceUseCase->handle($request);
            return redirect('/services')->with('updaservsuccess', 'Servicio modificado');
        } catch(\exception $e) {
            return redirect('/services');
        }
    }
}
