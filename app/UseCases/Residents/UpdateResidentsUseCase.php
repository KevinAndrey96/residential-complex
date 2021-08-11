<?php


namespace App\UseCases\Residents;


use App\Models\Resident;
use App\Models\User;
use App\UseCases\Contracts\Residents\UpdateResidentsUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateResidentsUseCase implements UpdateResidentsUseCaseInterface
{
    public function isOccupied(Request $request): bool
    {
        $newdatauser = request()->except('_token', 'user_id','status', 'role', 'tower', 'apt');
        $newdataresi = request()->except('token','user_id','status', 'role', 'name', 'phone','email','password');
        $users = User::all();
        $userout = User::find($request->input('user_id'));
        $userout->password = Hash::make($request->input('phone'));
        $userout->save();
        $resiout = Resident::where('user_id', '=', $userout->id)->first();
        $userout->update($newdatauser);

        foreach ($users as $user) {
            if ($user->role == 'Resident') {
                if ($user->resident->tower == $request->input('tower') && $user->resident->apt == $request->input('apt')) {
                        return true;
                }
            }
        }

        $resiout->update($newdataresi);
        return false;

    }
}
