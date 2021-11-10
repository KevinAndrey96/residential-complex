<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $oldPass1 = $user->password;
        $oldPass2 = $request->input('oldPassword');

        if (password_verify($oldPass2, $oldPass1)) {
            $user->password = hash::make($request->input('newPassword'));
            $user->save();
            return back()->with('changePasswordSuccess', 'Se ha cambiado la contraseña');
        }
        return back()->with('changePasswordFail', 'La contraseña no coincide');
    }
}
