<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Services\EditServiceUseCaseInterface;
use Illuminate\Http\Request;

class ServicesEditController extends Controller
{
    private EditServiceUseCaseInterface $editServiceUseCase;

    public function __construct(EditServiceUseCaseInterface $editServiceUseCase){
        $this->editServiceUseCase = $editServiceUseCase;

    }

    public function edit(Request $request){

        $service = $this->editServiceUseCase->handle($request);

        return view('services.edit', compact('service'));

    }
}
