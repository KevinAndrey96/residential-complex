<?php

namespace App\Http\Controllers\Residents;

use App\Http\Controllers\Controller;
use App\Models\Resident;
use App\Models\User;
use App\UseCases\Contracts\Residents\UpdateResidentsUseCaseInterface;
use Illuminate\Http\Request;

class ResidentsUpdateController extends Controller
{
    private UpdateResidentsUseCaseInterface $updateResidentsUseCase;

    public function __construct(UpdateResidentsUseCaseInterface $updateResidentsUseCase)
    {
        $this->updateResidentsUseCase = $updateResidentsUseCase;
    }

    public function update(Request $request)
    {
        $isOccupied = $this->updateResidentsUseCase->isOccupied($request);
        if ($isOccupied) {
            return redirect('/residents')->with('usedApt', 'El apartamento que selecciono ya tiene dueño');
        }
        return redirect('/residents')->with('updaresisuccess','Residente modificado');
    }
}
