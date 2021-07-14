<?php

namespace App\Http\Controllers\Adminreceps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminrecepsCreateController extends Controller
{
    public function create() {

        return view('adminreceps.create');

    }
}
