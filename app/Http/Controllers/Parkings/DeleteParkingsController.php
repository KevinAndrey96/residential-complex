<?php

namespace App\Http\Controllers\Parkings;

use App\Http\Controllers\Controller;
use App\Models\Parking;
use Illuminate\Http\Request;

class DeleteParkingsController extends Controller
{
    public function __invoke($id)
    {
        $parking = Parking::find($id);
        $parking->is_deleted = true;
        $parking->save();

        return redirect()->route('parkings.index');
    }
}
