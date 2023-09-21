<?php

namespace App\Http\Controllers\Parkings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateParkingsController extends Controller
{
    public function __invoke()
    {
        return view('parkings.create');
    }
}
