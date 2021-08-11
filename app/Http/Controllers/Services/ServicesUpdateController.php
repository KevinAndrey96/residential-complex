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
        $this->updateServiceUseCase->handle($request);
        return redirect('/services')->with('updaservsuccess', 'Servicio modificado');
    }
}
