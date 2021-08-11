<?php


namespace App\UseCases\Services;


use App\Models\Service;
use App\UseCases\Contracts\Services\DeleteServiceUseCaseInterface;
use Illuminate\Http\Request;


class DeleteServiceUseCase implements DeleteServiceUseCaseInterface
{
    public function handle(Request $request):Bool
    {
        Service::destroy($request->input('id'));
        return true;
    }
}
