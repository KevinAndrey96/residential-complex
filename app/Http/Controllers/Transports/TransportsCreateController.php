<?php

namespace App\Http\Controllers\Transports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransportsCreateController extends Controller
{
    public function create($id)
    {
        return view('transports.create', compact('id'));
    }
}
