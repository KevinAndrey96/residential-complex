<?php

namespace App\Http\Controllers\Residents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResidentsCreateController extends Controller
{
    public function create()
    {
        return view('residents.create');
    }


}
