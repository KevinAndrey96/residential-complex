<?php


namespace App\UseCases\Residents;


use App\Models\User;
use App\UseCases\Contracts\Residents\DeleteResidentsUseCaseInterface;
use Illuminate\Http\Request;


class DeleteResidentsUseCase implements DeleteResidentsUseCaseInterface
{
    public function handle(Request $request):void
    {
        User::destroy($request->input('id'));
    }
}
