<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::user()->role == 'Superadmin') {
            return redirect('/adminrecep');
        }
        if (Auth::user()->role == 'Administrator') {
            return redirect('/residents');
        }
        if (Auth::user()->role == 'Receptionist') {
            return redirect('/bookings');
        }
        if (Auth::user()->role == 'Resident') {
            return redirect()->route('news.show');
        }

        if (Auth::user()->role == 'Watchman') {
            return redirect()->route('parkings.index');
        }


        //return view('home');
    }
}
