<?php

namespace App\Http\Controllers\Adminreceps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adminrecep;

class AdminrecepsIndexController extends Controller
{
    public function index()
    {
       
        $adminreceps = Adminrecep::all();

        return view('adminreceps.index', compact('adminreceps'));


    }
}
