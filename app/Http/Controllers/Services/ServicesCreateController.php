<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesCreateController extends Controller
{
    public function create(){

        return view('services.create');

    }
}
