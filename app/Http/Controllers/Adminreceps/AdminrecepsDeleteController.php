<?php

namespace App\Http\Controllers\Adminreceps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adminrecep;

class AdminrecepsDeleteController extends Controller
{
    public function delete(Request $request)
    {
        Adminrecep::destroy($request->id);
        return redirect()->back();
    }
}
