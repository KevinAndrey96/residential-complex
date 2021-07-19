<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsCreateController extends Controller
{
    public function create(){

        return view('settings.create');
    }
}
