<?php

namespace App\Http\Controllers\Residents;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResidentsChooseController extends Controller
{
    public function __invoke()
    {
        return view('residents.import');
    }
}
