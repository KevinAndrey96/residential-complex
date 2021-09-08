<?php

namespace App\Http\Controllers\Extrainfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExtrainfoCreateController extends Controller
{
    public function create(Request $request)
    {

        $firstdata = $request;
        return view('extrainfo.create', compact('firstdata'));
    }
}
