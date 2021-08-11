<?php

namespace App\Http\Controllers\Residents;

use App\Http\Controllers\Controller;
use App\Models\Adminrecep;
use App\Models\Resident;
use App\Models\User;
use App\UseCases\Contracts\Residents\StoreResidentsUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResidentsStoreController extends Controller
{
    private StoreResidentsUseCaseInterface $storeResidentsUseCase;
    public function __construct(StoreResidentsUseCaseInterface $storeResidentsUseCase)
    {
        $this->storeResidentsUseCase = $storeResidentsUseCase;
    }

    public function store(Request $request)
    {
        $occupied = $this->storeResidentsUseCase->handle($request);

        if ($occupied) {
            return redirect('/residents')->with('residentFail', 'Apartamento ya en uso');
        }

        return redirect('/residents')->with('residentSuccess', 'Residente Registrado');
    }

}
