<?php

namespace App\Http\Controllers\Adminreceps;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Adminrecep;

class AdminrecepsEditController extends Controller
{
    public function edit(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        return view('adminreceps.edit', compact('user', 'id'));
    }
}
