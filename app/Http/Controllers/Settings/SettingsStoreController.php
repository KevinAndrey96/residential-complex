<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsStoreController extends Controller
{
    public function store(Request $request) 
    {
        
        $setting = new Setting();
        $setting->name = $request->input('name');
        $setting->num_tower = $request->input('num_tower');
        $setting->num_int = $request->input('num_int');
        $setting->num_apt = $request->input('num_apt');
        if ($request->hasFile('logo')) {
            $setting->logo  = Storage::put('images', $request->file('logo'));
        }
        $setting->glossary = $request->input('glossary');
        $setting->save();
        return redirect()->back()->with('settingSuccess','Configuración creada');
    }
}
