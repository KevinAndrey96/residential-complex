<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsUpdateController extends Controller
{
    public function update(Request $request)
    {
        $setting = request()->except(['_token','id']);
        Setting::where('id','=',$request->id)->update($setting);
        return redirect('/setting');
    }
}
