<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionsCreateController extends Controller
{
    public function create(){

        return view('permissions.create');
    }
}
