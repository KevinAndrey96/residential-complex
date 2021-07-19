<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsDeleteController extends Controller
{
    public function delete(Request $request)
    {
        Setting::destroy($request->input('id'));
        return redirect()->back();
    }
}
