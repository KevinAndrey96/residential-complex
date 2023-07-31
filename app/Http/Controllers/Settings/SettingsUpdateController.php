<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsUpdateController extends Controller
{
    public function update(Request $request)
    {
        $setting = Setting::find($request->input('id'));
        $setting->name = $request->input('name');
        $setting->num_tower = $request->input('num_tower');
        $setting->num_apt = $request->input('num_apt');
        $setting->glossary = $request->input('glossary');
        $setting->principal_color = $request->input('principal_color');
        $setting->second_color = $request->input('second_color');
        $setting->third_color = $request->input('third_color');
        $setting->fourth_color = $request->input('fourth_color');
        $setting->save();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = 'logo_image';
            $fileName = strval($setting->id);
            uploadFile($file, $fileName, $path);
            $setting->logo = '/storage/' . $path . '/' . $fileName . '.png';
            $setting->save();
        }

        return redirect('/setting');
        }
}
