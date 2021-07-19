<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesIndexController extends Controller
{
    public function index(Request $request){
        /** @var TYPE_NAME $roles */
        $roles = Role::all();
        $permissions = Permission::all();
        return view('roles.index', compact('roles'));

    }
}
