<?php

namespace App\Http\Controllers\Residents;

use App\Http\Controllers\Controller;
use App\Imports\ResidentsImport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ResidentsImportController extends Controller
{
    public function __invoke(Request $request)
    {
        set_time_limit(2000);

        $fields = [
            'residentsFile'=>'required|mimes:xlsx,csv,xls'
        ];
        $message = [
            'required'=>':attribute es requerido'
        ];

        $this->validate($request, $fields, $message);

        $file = $request->file('residentsFile');

        Excel::import(new ResidentsImport(), $file);

        return back()->with('ResidentsImportSuccess', 'Importación de residentes satisfactoria');

    }
}
