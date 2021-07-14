<?php

namespace App\Http\Controllers\Adminreceps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Adminrecep;

class AdminrecepsUpdateController extends Controller
{
    public function update(Request $request)
    {
        if ($request->password == null ) {        
            $adminrecep = request()->except(['_token','password']);
            Adminrecep::where('id','=',$request->id)->update($adminrecep);
            return redirect('/adminrecep');
        } else {
            $adminrecep = request()->except(['_token']);
            $adminrecep['password'] = Hash::make($request->password);
            Adminrecep::where('id','=',$request->id)->update($adminrecep);
            return redirect('/adminrecep');    
        }
        /*
        $adminrecep = Adminrecep::find($request->id);
        if ($request->password == 'null' )
        {
            $adminrecep->name = $request->name;
            $adminrecep->phone = $request->phone;
            $adminrecep->email = $request->email;
            $adminrecep->document = $request->document;
            $adminrecep->role = $request->role;
            $adminrecep->save();
        } else {
            $adminrecep->name = $request->name;
            $adminrecep->phone = $request->phone;
            $adminrecep->email = $request->email;
            $adminrecep->document = $request->document;
            $adminrecep->role = $request->role;
            $adminrecep->password = $request->password;
            $adminrecep->save();
        }
        */
    }
}
