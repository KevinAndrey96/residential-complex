<?php

namespace App\Http\Controllers\Receptionists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReceptionistsCreateController extends Controller
{
    public function create()
    {
        return view('receptionists.create');
    }
}
