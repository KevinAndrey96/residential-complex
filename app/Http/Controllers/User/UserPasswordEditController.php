<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPasswordEditController extends Controller
{

    public function passwordEdit($id)
    {
        return view('users.changePassword');
    }
}
