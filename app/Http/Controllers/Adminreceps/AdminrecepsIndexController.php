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
        set_time_limit(0);


        $users = User::where('is_deleted', 0)->get();
        return view('adminreceps.index', compact('users'));
    }
}
