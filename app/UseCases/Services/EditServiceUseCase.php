<?php

namespace App\UseCases\Services;

use App\Models\Service;
use App\UseCases\Contracts\Services\EditServiceUseCaseInterface;
use Illuminate\Http\Request;

class EditServiceUseCase implements EditServiceUseCaseInterface
{
    public function handle(Request $request): Service
    {
        $service = Service::find($request->input('id'));

        return $service;

    }
}
