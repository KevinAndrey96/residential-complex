<?php

namespace App\Http\Controllers\Adminreceps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adminrecep;

class AdminrecepsEditController extends Controller
{
    public function edit(Request $request)
    {
        $id = $request->id;
        $adminrecep = Adminrecep::find($id);

        return view('adminreceps.edit', compact('adminrecep', 'id'));

    }
}
