<?php

namespace App\Http\Controllers\Adminreceps;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Adminrecep;

class AdminrecepsUpdateController extends Controller
{
    public function update(Request $request)
    {
        if ($request->input('password') == null) {
            $user = request()->except(['_token','role','password','document','id']);
            User::where('id','=',$request->input('id'))->update($user);
            $obuser =  User::where('id','=',$request->input('id'))->first();
            $adminrecep = request()->except(['_token','password','name','phone','email','id']);
            Adminrecep::where('user_id', '=', $request->id)->update($adminrecep);
            $obuser->roles()->detach();
            if ($request->input('role') == 'Administrator') {
                $obuser->assignRole('Administrator');
            } else {
                $obuser->assignRole('Receptionist');
            }

            return redirect('/adminrecep');

        } else {
            $user = request()->except(['_token','role','document','id']);
            $user['password'] = Hash::make($request->input('password'));
            User::where('id','=',$request->input('id'))->update($user);
            $obuser =  User::where('id','=',$request->input('id'))->first();
            $adminrecep = request()->except(['_token','password','name','phone','email','id']);
            Adminrecep::where('user_id', '=', $request->id)->update($adminrecep);
            $obuser->roles()->detach();
            if ($request->input('role') == 'Administrator') {
                $obuser->assignRole('Administrator');
            } else {
                $obuser->assignRole('Receptionist');
            }
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
