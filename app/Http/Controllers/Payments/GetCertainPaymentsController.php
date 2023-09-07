<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class GetCertainPaymentsController extends Controller
{
    public function __invoke(Request $request)
    {
        $payments = Payment::whereIn('year', $request->input('years'))
                            ->whereIn('month', $request->input('months'))
                            ->whereIn('user_id', $request->input('userIDS'))
                            ->orderBy('year', 'desc')
                            ->orderBy('month', 'desc')
                            ->with(['user', 'user.resident'])
                            ->get();


        return datatables()->collection($payments)->toJson();


    }
}
