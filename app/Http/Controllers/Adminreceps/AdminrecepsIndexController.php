<?php

namespace App\Http\Controllers\Adminreceps;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Adminrecep;

class AdminrecepsIndexController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('adminreceps.index', compact('users'));
    }
}
