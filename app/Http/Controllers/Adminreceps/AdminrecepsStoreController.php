<?php

namespace App\Http\Controllers\Adminreceps;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Adminrecep;

class AdminrecepsStoreController extends Controller
{
    public function store(Request $request)
    {
        $adminrecep = new Adminrecep;
        $adminrecep->name = $request->name;
        $adminrecep->phone = $request->phone;
        $adminrecep->email = $request->email;
        $adminrecep->document = $request->document_number;
        $adminrecep->role = $request->role;
        $adminrecep->password = Hash::make($request->password);
        $adminrecep->save();
        $user = Adminrecep::where('email', 'like', $request->email)->first(); 
        
        if ($request->role == 'Administrator') {
            $user->assignRole('Administrator');
        } else {
            $user->assignRole('Receptionist');
        }
        
        return redirect()->back()->with('adminrecepSuccess', 'Administrador Registrado');
    }
}
