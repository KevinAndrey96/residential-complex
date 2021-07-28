<?php

namespace App\Http\Controllers\Residents;

use App\Http\Controllers\Controller;
use App\Models\Resident;
use App\Models\User;
use App\UseCases\Contracts\Residents\ChangeStatusResidentsUseCaseInterface;
use Illuminate\Http\Request;

class ResidentsChangeStatusController extends Controller
{
    private ChangeStatusResidentsUseCaseInterface $changeStatusResidentUseCase;

    public function __construct(ChangeStatusResidentsUseCaseInterface $changeStatusResidentUseCase){
        $this->changeStatusResidentUseCase = $changeStatusResidentUseCase;
    }

    public function changeStatus(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->changeStatusResidentUseCase->handle($request);
        return back();
    }
}
