<?php

namespace App\Http\Controllers\Pets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetsCreateController extends Controller
{
    public function create($id)
    {
        return view('pets.create', compact('id'));
    }
}
