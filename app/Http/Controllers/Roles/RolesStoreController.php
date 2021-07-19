<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesStoreController extends Controller
{
    public function store(Request $request)
    {

        $role = Role::create(['name' => $request->name_role]);
        $ids = explode(',', $request->cart);
        
        foreach ($ids as $id) {
            $permission =  Permission::find($id);
            $permission->assignRole($role);
        }
    
        return redirect()->back();
    }
}
