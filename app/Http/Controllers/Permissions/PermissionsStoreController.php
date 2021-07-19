<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsStoreController extends Controller
{
    public function store(Request $request){
        Permission::create(['name'=>$request->input('name_permission')]);
        return view('permissions.create');
    }
}
