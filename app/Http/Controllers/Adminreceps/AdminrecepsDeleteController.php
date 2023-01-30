<?php

namespace App\Http\Controllers\Adminreceps;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminrecepsDeleteController extends Controller
{
    public function delete(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->is_deleted = 1;
        $user->save();

        return redirect()->back();
    }
}
