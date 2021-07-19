<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesCreateController extends Controller
{
    public function create(){
        
        
         $permissions = Permission::all();

        return view('roles.create',compact('permissions'));
    }
}
