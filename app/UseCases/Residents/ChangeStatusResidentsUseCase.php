<?php


namespace App\UseCases\Residents;


use App\Models\Resident;
use App\Models\User;
use App\UseCases\Contracts\Residents\ChangeStatusResidentsUseCaseInterface;
use Illuminate\Http\Request;

class ChangeStatusResidentsUseCase Implements ChangeStatusResidentsUseCaseInterface
{


    public function handle(Request|\App\UseCases\Contracts\Residents\Request $request): void
    {
        $user = User::find($request->input('id'));
        $user_id = $user->id;
        $resident = Resident::where('user_id', '=', $user_id)->first();
        $resident->status = $request->status;
        $resident->save();
    }
}
