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
        $this->storeResidentsUseCase->handle($request);
        return redirect()->back()->with('residentSuccess', 'Residente Registrado');
    }

}
