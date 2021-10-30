<?php

namespace App\Http\Controllers\Habitants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HabitantsCreateController extends Controller
{
    public function create($id) {
        return view('habitants.create', compact('id'));
    }
}
