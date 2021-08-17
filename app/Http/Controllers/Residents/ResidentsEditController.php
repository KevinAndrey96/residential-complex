<?php

namespace App\Http\Controllers\Residents;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\UseCases\Contracts\Residents\EditResidentsUseCaseInterface;
use Illuminate\Http\Request;

class ResidentsEditController extends Controller
{
    private EditResidentsUseCaseInterface $editResidentsUseCase;

    public function __construct(EditResidentsUseCaseInterface $editResidentsUseCase)
    {
        $this->editResidentsUseCase = $editResidentsUseCase;
    }

    public function edit(Request $request)
    {
        $user = $this->editResidentsUseCase->handle($request);
        return view('residents.edit', compact('user'));
    }
}
