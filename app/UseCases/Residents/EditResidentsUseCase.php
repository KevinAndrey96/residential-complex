<?php


namespace App\UseCases\Residents;


use App\Models\User;
use App\UseCases\Contracts\Residents\EditResidentsUseCaseInterface;
use Illuminate\Http\Request;

class EditResidentsUseCase implements EditResidentsUseCaseInterface
{

    public function handle($id):User
    {
        return User::find($id);
    }

}

