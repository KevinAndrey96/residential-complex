<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsEditController extends Controller
{
    public function edit(Request $request){
        $setting = Setting::find($request->id);
        return view('settings.edit', compact('setting'));

    }


}
