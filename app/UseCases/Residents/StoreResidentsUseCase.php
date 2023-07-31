<?php

namespace App\UseCases\Residents;

use App\Models\Resident;
use App\Models\User;
use App\UseCases\Contracts\Residents\StoreResidentsUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class StoreResidentsUseCase
 * @package App\UseCases\Residents
 */
class StoreResidentsUseCase implements StoreResidentsUseCaseInterface
{
    public function handle(Request $request):bool
    {
        $users = User::all();
        foreach ($users as $user) {
            if ($user->role == 'Resident') {
                if ($user->resident->tower == $request->input('tower') && $user->resident->apt == $request->input('apt')) {
                    return true;
                }
            }
        }

        $user =  new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->phone);
        $user->save();
        $resident = new Resident();
        $resident->tower = $request->input('tower');
        $resident->apt = $request->input('apt');
        $resident->status = $request->input('status');
        $resident->user_id = $user->id;
        $resident->save();
        $user->assignRole('Resident');
        return false;
    }
}
