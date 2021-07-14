<?php

namespace App\Http\Controllers\superadmins;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class SuperadminsLoginController extends Controller
{
    use AuthenticatesUsers;

    /*
    public function showLoginForm()
    {
        return view('superadmins.login');
    }
    */
    
    
   protected $loginView = "superadmins.login";

    protected $guard = 'superadmins';

    public function authenticated(){
        return redirect('superadmins/area');
    }

    public function secret(){
        return auth('superadmins')->user()->name;
    }
}
