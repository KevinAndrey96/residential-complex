<?php

namespace App\Http\Controllers\Adminreceps;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminrecepsDeleteController extends Controller
{
    public function delete(Request $request)
    {
        User::destroy($request->id);
        return redirect()->back();
    }
}
