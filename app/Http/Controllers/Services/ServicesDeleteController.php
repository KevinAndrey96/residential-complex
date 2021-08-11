<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Services\DeleteServiceUseCaseInterface;
use Illuminate\Http\Request;

class ServicesDeleteController extends Controller
{
    private DeleteServiceUseCaseInterface $deleteServiceUseCase;

    public function __construct(DeleteServiceUseCaseInterface $deleteServiceUseCase)
    {
        $this->deleteServiceUseCase = $deleteServiceUseCase;
    }

    public function delete(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $this->deleteServiceUseCase->handle($request);
        return redirect('/services');
    }
}
