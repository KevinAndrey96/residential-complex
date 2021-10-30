<?php

namespace App\Http\Controllers\Transports;

use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportsDeleteController extends Controller
{
    public function delete($id)
    {
        Transport::destroy($id);
        return back()->with('deleteTransportSuccess', 'Transporte eliminado');
    }
}
