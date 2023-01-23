<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Services\StoreServiceUseCaseInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesStoreController extends Controller
{

    private StoreServiceUseCaseInterface $storeServiceUseCase;

    public function __construct(StoreServiceUseCaseInterface $storeServiceUseCase)
    {
        $this->storeServiceUseCase  = $storeServiceUseCase;
    }


    public function store(Request $request)
    {
        //return $request;
        
            $fields = [
                'title' => 'required|string',
                'capacity' => 'required',
                'strip' => 'required',
                'start' => 'required|string',
                'final' => 'required|string',
                'state' => 'required|string',
                'monday' => 'required|string',
                'tuesday' => 'required|string',
                'wednesday' => 'required|string',
                'thursday' => 'required|string',
                'friday' => 'required|string',
                'saturday' => 'required|string',
                'sunday' => 'required|string',
                'description' => 'required|string',
                'status' => 'required|string',
                'role' => 'required|string',
                'gallery' => 'required',
                'gallery.*' => 'mimes:jpeg,jpg,png'

            ];
            $message = [
                'required' => ':attribute es requerido',
            ];
            $this->validate($request, $fields, $message);

            $this->storeServiceUseCase->handle($request);
            return redirect('/services');
    }
}
