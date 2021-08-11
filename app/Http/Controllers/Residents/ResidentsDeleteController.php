<?php

namespace App\Http\Controllers\Residents;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\UseCases\Contracts\Residents\DeleteResidentsUseCaseInterface;
use Illuminate\Http\Request;

class ResidentsDeleteController extends Controller
{
    private DeleteResidentsUseCaseInterface $DeleteResidentsUseCase;

    public function __construct(DeleteResidentsUseCaseInterface $DeleteResidentsUseCase)
    {
        $this->DeleteResidentsUseCase = $DeleteResidentsUseCase;
    }

    public function delete(Request $request){
        $this->DeleteResidentsUseCase->handle($request);
        return redirect('/residents');
    }


}
