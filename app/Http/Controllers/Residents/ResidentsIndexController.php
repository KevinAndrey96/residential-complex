<?php

namespace App\Http\Controllers\Residents;

use App\Http\Controllers\Controller;
use App\Models\Resident;
use App\Models\User;
use Illuminate\Http\Request;

class ResidentsIndexController extends Controller
{
    public function index(){
        $users = User::where([['role', 'Resident'],
                            ['is_deleted',0]])->get();

        return view('residents.index', compact('users'));
    }
}
