<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class SettingsIndexController extends Controller
{
    public function index(){
        $settings = Setting::all();
        return view('settings.index', compact('settings'));
    }
}
