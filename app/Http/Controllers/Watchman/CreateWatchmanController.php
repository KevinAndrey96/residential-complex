<?php

namespace App\Http\Controllers\Watchman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateWatchmanController extends Controller
{
    public function __invoke()
    {
        return view('watchman.create');
    }
}
